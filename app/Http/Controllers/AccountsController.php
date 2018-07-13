<?php

namespace App\Http\Controllers;

use App\Country;
use App\BusinessSector;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->user();
        $company = $user->company;
        $businessSectors = BusinessSector::all();
        $countries = Country::all();

        return view('accounts.edit', compact('user', 'company', 'countries', 'businessSectors'));
    }
}
