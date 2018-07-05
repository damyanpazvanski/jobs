<?php

namespace App\Http\Controllers;

use App\BusinessSector;
use App\Company;
use App\Country;
use App\Http\Requests\CompanyRequest;

class CompaniesController extends Controller
{

    public function update(Company $company, CompanyRequest $request)
    {
        $company->fill($request->all());

        $company->businessSector()->associate(BusinessSector::find($request->get('business_sector_id')));
        $company->country()->associate(Country::find($request->get('country_id')));

        $company->save();

        $request->session()->flash('success', 'Successfully saved');

        return back();
    }
}
