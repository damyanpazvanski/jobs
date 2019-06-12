<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;


class PricesController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $user = auth()->user();
        $company = $user->company;

        $invoice = $user->invoicesIncludingPending()->all()[0];
        $plan = Plan::where('braintree_plan', $invoice->planId)->first();

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML(View::make('pdf.invoice', compact('user', 'company', 'invoice', 'plan')))->setPaper('a4', 'landscape');

        return $pdf->download('Invoice.pdf');
    }
}
