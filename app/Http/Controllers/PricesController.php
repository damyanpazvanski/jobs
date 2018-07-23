<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class PricesController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $user = auth()->user();

//        if ($user->onTrial() || $user->subscribed('small') ||
//            $user->subscribed('pro') || $user->subscribed('enterprise')) {
//            return redirect('/');
//        }

//        $invoice = $user->invoices()->keys()->last();
        dd($user->invoicesIncludingPending());


//        return View::make('emails.invoice', compact('invoice'));

        return $user->downloadInvoice($user->invoices()->first()->id, [
            'vendor'  => 'Your Company',
            'product' => 'Your Product',
        ]);

        return 'pricing';
    }
}
