<?php

namespace App\Http\Controllers\Ajax;

use App\Actions\Subscriptions\Update;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{

    public function update(Request $request)
    {
        (new Update($request->get('card')))->handle();

        return response()->json([]);
    }
}
