<?php

namespace App\Http\Controllers\Auth\CompanyAdmins;

use App\BusinessSector;
use App\CompanyAdmin;
use App\Country;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return Auth::guard('companyAdmin');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $businessSectors = BusinessSector::all();
        $countries = Country::all();

        return view('auth.register', compact('businessSectors', 'countries'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|min:8|max:20',
            'card_brand' => 'nullable|string|min:2|max:255',
            'card_last_four' => 'nullable|integer|digits:4',
            'trial' => 'nullable|integer|between:0,1'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $trialEndAt = null;
        if ($data['trial'] == 1) {
            $trialEndAt = Carbon::now()->addMonth(1);
        }

        return CompanyAdmin::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'card_brand' => $data['card_brand'],
            'trial_ends_at' => $trialEndAt,
            'card_last_four' => $data['card_last_four'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
