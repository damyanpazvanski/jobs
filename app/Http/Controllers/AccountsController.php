<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Support\Facades\App;

class AccountsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        if (auth()->user() instanceof Candidate) {
            return App::make(CandidatesController::class)->edit();
        }

        return App::make(CompanyAdminsController::class)->edit();
    }
}
