<?php

namespace App\Http\Controllers\Ajax;

use App\Actions\Tests\Store;
use App\Candidate;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;


class TestsController extends Controller
{

    public function validateEmail(TestRequest $request)
    {
        $candidate = Candidate::where('email', $request->get('email'))->first();

        $candidate->iqResult['email'] = $candidate->email;
        $candidate->iqResult['is_updated'] = $candidate->first_name ? true : false;

        return response()->json($candidate->iqResult);
    }

    public function candidateInformation(TestRequest $request)
    {
        Candidate::where('email', $request->get('email'))->first()->fill($request->all())->save();

        return response()->json([]);
    }

    public function attempt(TestRequest $request)
    {
        $candidate = Candidate::where('email', $request->get('email'))->first();
        $candidate->iqResult->increment('attempts');

        return response()->json([]);
    }

    public function store(TestRequest $request)
    {
        $iqResult = (new Store($request->get('email'), $request->get('questions'), $request->get('bonus')))->handle();

        return response()->json($iqResult);
    }
}
