<?php

namespace App\Http\Controllers;

use App\Image;
use App\Company;
use App\Country;
use App\BusinessSector;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function updateImage(ImageRequest $request)
    {
        $company = auth()->user()->company;
        $image = $company->image;

        if (is_null($image)) {
            $image = new Image();
        } else {
            Storage::disk()->delete('company_admins/' . auth()->user()->id . '/images/' . $image->name);
        }

        $image->name = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('company_admins/' . auth()->user()->id . '/images', $image->name);

        $image->save();

        $company->image()->associate($image);
        $company->save();

        $request->session()->flash('success', 'Successfully saved');

        return back();
    }

}
