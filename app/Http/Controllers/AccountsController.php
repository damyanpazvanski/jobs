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
    public function index()
    {
        $company = auth()->user()->company;
        $businessSectors = BusinessSector::all();
        $countries = Country::all();

        return view('accounts.index', compact('company', 'countries', 'businessSectors'));
    }
}
