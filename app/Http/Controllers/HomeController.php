<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user() instanceof Candidate) {
            return App::make(self::class)->candidatesIndex();
        }

        return view('home');
    }

    public function candidatesIndex()
    {
        return view('candidatesViews.home');
    }
}
