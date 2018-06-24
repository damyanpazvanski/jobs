<?php

namespace App\Http\Controllers\Ajax;

use App\Actions\Tests\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;


class TestsController extends Controller
{

    public function validateEmail(TestRequest $request)
    {
        return response()->json([]);
    }

    public function store(TestRequest $request)
    {
        return (new Store($request->get('email'), $request->get('questions'), $request->get('bonus')))->handle();
    }
}
