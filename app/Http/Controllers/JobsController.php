<?php

namespace App\Http\Controllers;

use App\Job;
use App\Country;
use App\WorkTime;
use App\Http\Requests\JobRequest;

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
        $candidates = $job->candidates()->paginate(10);

        return view('jobs.show', compact('job', 'candidates'));
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

        return redirect('/jobs');
    }
}
