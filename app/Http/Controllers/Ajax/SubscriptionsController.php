<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{

    public function update(Request $request)
    {


        $request->session()->flash('success', trans('messages.updated_successfully'));

        return redirect('/');
    }
}
