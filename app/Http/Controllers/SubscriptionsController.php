<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{

    public function index()
    {
        $token = \Braintree_ClientToken::generate();

        return view('subscriptions.index', compact('token'));
    }

    public function store(Request $request)
    {
        $plan = Plan::findOrFail($request->plan);

        $request->user()->newSubscription('main', $plan->braintree_plan)->create($request->payment_method_nonce);

        return back();
    }

    public function destroy(Request $request)
    {
        $user = auth()->user();

        $user->subscription($user->getSubscription()->name)->cancel();

        $request->session()->flash('success', trans('messages.disabled_successfully'));

        return back();
    }
}
