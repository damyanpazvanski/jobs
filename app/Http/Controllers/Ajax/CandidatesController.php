<?php

namespace App\Http\Controllers\Ajax;

use App\CompanyAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class CandidatesController extends Controller
{
    public static $EMAILS_LIST = [];

    public function store(RegistrationRequest $request)
    {
        return response()->json([]);
    }
}
