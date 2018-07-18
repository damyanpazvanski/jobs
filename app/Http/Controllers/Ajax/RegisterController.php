<?php

namespace App\Http\Controllers\Ajax;

use App\Actions\CompanyAdmins\Store;
use App\Http\Requests\CompanyAdminRequest;
use App\Http\Requests\CompanyRequest;
use App\Notifications\CustomPlan;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{

    public function store(RegistrationRequest $request)
    {
        (new Store($request->get('user'), $request->get('company'), $request->get('card')))->handle();

        return response()->json([]);
    }

    public function userInformation(CompanyAdminRequest $request)
    {
        return response()->json([]);
    }

    public function companyInformation(CompanyRequest $request)
    {
        return response()->json([]);
    }

    public function sendMessage(RegistrationRequest $request)
    {
        Notification::route('mail', config('services.support.email'))
            ->notify(new CustomPlan($request->get('user'), $request->get('company'), $request->get('message')));
    }
}
