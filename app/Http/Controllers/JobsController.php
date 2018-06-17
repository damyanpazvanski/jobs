<?php

namespace App\Http\Controllers;

use App\Company;
use App\Country;
use App\Http\Requests\JobRequest;
use App\Job;
use App\WorkTime;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('jobs.index');
    }

    public function show()
    {
        return view('jobs.show');
    }

    public function create()
    {
        $workTimes = WorkTime::all();
        $countries = Country::all();

        return view('jobs.create', compact('workTimes', 'countries'));
    }

    public function store(JobRequest $request)
    {
        $job = new Job($request->all());

        $job->country()->associate(Company::find($request->get('company_id')));
        $job->workTime()->associate(WorkTime::find($request->get('work_time_id')));
        $job->company_id = 1;

        $job->save();

        return back();
    }
}
