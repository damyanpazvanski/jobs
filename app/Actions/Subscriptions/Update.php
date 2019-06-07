<?php

namespace App\Actions\Subscriptions;

use App\Plan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Update
{

    private $card;

    public function __construct($card)
    {
        $this->card = $card;
    }

    public function handle()
    {
        DB::transaction(function() {
            $this->validateCoupon($this->card);
            $this->validateCardInformation($this->card);

            $planSlug = $this->card['chosenPlanName'] . '-business-' . $this->card['period'];
            $plan = Plan::where('slug', $planSlug)->firstOrFail();

            $companyAdmin = auth()->user();
            $company = $companyAdmin->company;

            $companyAdmin->subscription($companyAdmin->getSubscription()->name)->cancelNow();

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
                    'locality' => $company->city,
                    'countryName' => $company->country->name,
                    'customFields' => [
                        'companyPhone' => $company->phone,
                    ]
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
