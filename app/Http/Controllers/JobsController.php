<?php

namespace App\Http\Controllers;

use App\Http\Resources\DisabledJobsResource;
use App\Job;
use App\Country;
use App\WorkTime;
use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

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

    public function disabled()
    {
        $jobs = DisabledJobsResource::collection(
            auth()->user()->company->jobs()->onlyTrashed()->get()
        )->collection;

        return view('jobs.disabled', compact('jobs'));
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
        dd(1, $request->all());
        die;
        
        $job = new Job($request->all());

        $job->company()->associate(auth()->user()->company);
        $job->country()->associate($request->get('country_id'));
        $job->workTime()->associate($request->get('work_time_id'));


        dd($job, $job->save());

        $job->save();

        return back();
    }

    public function downloadPdf(Job $job)
    {
        $pdf = App::make('dompdf.wrapper');

        $company = auth()->user()->company;
        $candidates = $job->bestCandidates;

        $pdf->loadHTML(View::make('pdf.job.candidates.index', compact('company', 'candidates', 'job')))->setPaper('a4', 'landscape');

        return $pdf->download('candidates.pdf');
    }

}
