<?php

namespace App\Http\Controllers;


class TestsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('tests.index');
    }
}
