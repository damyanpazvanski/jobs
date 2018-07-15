<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{

    public function store(Request $request)
    {
        $plan = Plan::findOrFail($request->plan);

        $request->user()->newSubscription('main', $plan->braintree_plan)->create($request->payment_method_nonce);

        return back();
    }
}
