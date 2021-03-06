<?php

namespace App\Http\Controllers;

use App\Country;
use App\CompanyAdmin;
use App\BusinessSector;
use App\Http\Requests\CompanyAdminRequest;

class CompanyAdminsController extends Controller
{

    public function edit()
    {
        $user = auth()->user();
        $plan = null;
        $subscription = null;
        $company = $user->company;
        $businessSectors = BusinessSector::all();
        $countries = Country::all();

        if (!$user->onTrial()) {
            $subscription = $user->getSubscription();
            $plan = $user->getPlan($subscription->id);
        }

        return view('accounts.edit', compact('user', 'subscription', 'plan', 'company', 'countries', 'businessSectors'));
    }

    public function update(CompanyAdmin $companyAdmin, CompanyAdminRequest $request)
    {
        $companyAdmin->fill($request->all())->save();

        $request->session()->flash('success', trans('messages.updated_successfully'));

        return back();
    }
}
