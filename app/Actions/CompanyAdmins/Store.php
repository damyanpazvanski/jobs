<?php

namespace App\Actions\CompanyAdmins;

use App\Discount;
use App\Plan;
use App\Role;
use App\Company;
use App\Country;
use App\CompanyAdmin;
use App\BusinessSector;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Store
{

    private $user;
    private $company;
    private $card;

    public function __construct($user, $company, $card)
    {
        $this->user = $user;
        $this->company = $company;
        $this->card = $card;
    }

    public function handle()
    {
        DB::transaction(function() {
            $companyAdmin = CompanyAdmin::firstOrNew(['email' => $this->user['email']], $this->user);
            $companyAdmin->password = Hash::make($this->user['password']);

            $companyAdmin->role()->associate(Role::where('name', 'company_admin')->first());

            // TODO: save image
            $this->company['image_id'] = null;
            unset($this->company['image']);
            unset($this->company['imageName']);

            $company = Company::firstOrNew($this->company);

            $company->businessSector()->associate(BusinessSector::find($this->company['business_sector_id']));
            $company->country()->associate(Country::find($this->company['country_id']));
            $company->save();

            $companyAdmin->company()->associate($company);

            if ($this->card['trial']) {
                $companyAdmin->trial_ends_at = Carbon::now()->addDays(30);
                $companyAdmin->save();

                return;
            }

            $companyAdmin->save();

            $this->validateCoupon($this->card);
            $this->validateCardInformation($this->card);

            $planSlug = $this->card['chosenPlanName'] . '-business-' . $this->card['period'];
            $plan = Plan::where('slug', $planSlug)->firstOrFail();

            $companyAdmin->newSubscription($this->card['chosenPlanName'], $plan->braintree_plan)
                ->withCoupon($this->card['coupon'])
                ->create($this->card['paymentData']['nonce'], [
                    'id' => $companyAdmin->id,
                    'firstName' => $companyAdmin->first_name,
                    'lastName' => $companyAdmin->last_name,
                    'company' => $company->name,
                    'email' => $companyAdmin->email,
                    'phone' => $companyAdmin->phone,
                    'website' => $company->website,
//                    'locality' => $company->city,
//                    'countryName' => $company->country->name,
//                    'customFields' => [
//                        'companyPhone' => $company->phone
//                    ]
                ]);
        });
    }

    private function validateCardInformation($card)
    {
        Validator::make($card, [
            'chosenPlanName' => 'string|in:small,pro,enterprise',
            'period' => 'string|in:annually,monthly',
            'paymentData.details.cardType' => 'string|max:20',
            'paymentData.details.lastFour' => 'integer|digits:4',
            'paymentData.details.lastTwo' => 'integer|digits:2',
            'paymentData.nonce' => 'string',
            'paymentData.type' => 'string|max:30',
            'paymentData.coupon' => 'string|max:30'
        ])->validate();
    }

    private function validateCoupon($card)
    {
        $card['coupon'] = strtolower($card['coupon']);

        Validator::make($card, [
            'coupon' => 'nullable|string|exists:discounts,name'
        ])->validate();
    }
}
