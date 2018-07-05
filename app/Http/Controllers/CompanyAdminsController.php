<?php

namespace App\Http\Controllers;

use App\CompanyAdmin;
use App\Http\Requests\CompanyAdminRequest;

class CompanyAdminsController extends Controller
{

    public function update(CompanyAdmin $companyAdmin, CompanyAdminRequest $request)
    {
        $companyAdmin->fill($request->all())->save();

        $request->session()->flash('success', 'Successfully saved');

        return back();
    }
}
