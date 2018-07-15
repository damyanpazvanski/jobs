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
        $company = $user->company;
        $businessSectors = BusinessSector::all();
        $countries = Country::all();

        return view('accounts.edit', compact('user', 'company', 'countries', 'businessSectors'));
    }

    public function update(CompanyAdmin $companyAdmin, CompanyAdminRequest $request)
    {
        $companyAdmin->fill($request->all())->save();

        $request->session()->flash('success', trans('messages.updated_successfully'));

        return back();
    }
}
