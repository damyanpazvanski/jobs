<?php

namespace App\Http\Controllers\Ajax;

use App\Role;
use App\Country;
use App\Company;
use App\CompanyAdmin;
use App\BusinessSector;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function store(Request $request)
    {
        $userInformation = $request->get('user');

        $companyAdmin = new CompanyAdmin([
            'first_name' => $userInformation['firstName'],
            'last_name' => $userInformation['lastName'],
            'email' => $userInformation['email'],
            'phone' => $request->get('company')['phone'],
            'password' => Hash::make($userInformation['password'])
        ]);

        $companyAdmin->role()->associate(Role::where('name', 'company_admin')->first());

        $companyInformation = $request->get('company');

        $company = new Company($companyInformation);

        $company->businessSector()->associate(BusinessSector::find($companyInformation['business_sector']));
        $company->country()->associate(Country::find($companyInformation['country_id']));
        $company->save();

        $companyAdmin->company()->associate($company);
        $companyAdmin->save();

        return $companyAdmin;
    }

    public function userInformation(RegistrationRequest $request)
    {
        return response()->json([]);
    }

    public function companyInformation(RegistrationRequest $request)
    {
        return response()->json([]);
    }
}
