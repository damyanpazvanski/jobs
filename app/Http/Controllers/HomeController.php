<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return App::make(self::class)->presentationIndex();
        } else
        if (auth()->user() instanceof Candidate) {
            return App::make(self::class)->candidatesIndex();
        }

        return view('home');
    }

    public function candidatesIndex()
    {
        return view('candidatesViews.home');
    }

    public function presentationIndex()
    {
        return view('presentationViews.index');
    }
}
