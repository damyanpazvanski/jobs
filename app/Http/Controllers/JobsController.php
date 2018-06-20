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
        $jobs = auth()->user()->company->jobs;

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('jobs.show', $job);
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

        $job->status = 'open';
        $job->company()->associate(auth()->user()->company);

        $job->country()->associate(Country::find($request->get('country_id')));
        $job->workTime()->associate(WorkTime::find($request->get('work_time_id')));

        $job->save();

        return back();
    }
}
