<?php

namespace App\Http\Controllers;

use App\Actions\Filters\AllCandidates;
use App\Http\Requests\AllCandidatesFilterRequest;
use App\Job;
use App\Candidate;
use App\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class CandidatesController extends Controller
{

    public function index(AllCandidatesFilterRequest $request)
    {
        $workTimes = WorkTime::all();
        $candidates = (new AllCandidates(
            Input::get('status'),
            Input::get('city'),
            Input::get('position'),
            Input::get('level'),
            Input::get('work_time_id'),
            Input::get('order_by_result'),
            Input::get('order_by_first_name'),
            Input::get('order_by_last_name'),
            20
        ))->handle();

        return view('candidates.index', compact('workTimes', 'candidates'));
    }

    public function show(Job $job, Candidate $candidate)
    {
        return view('candidates.show', compact('job', 'candidate'));
    }

    public function cvDownload(Candidate $candidate, Request $request)
    {
        if (!file_exists(base_path('/public/storage/candidates/' . $candidate->id . '/cvs/' . $candidate->cv->name))) {
            $request->session()->flash('error', trans('validation.exists', ['attribute' => 'CV']));
            return back();
        }

        $extention = strstr($candidate->cv->name, '.');

        if ($extention === 'docx') {
            header("Content-Type: docx");
        } else {
            header("Content-Type: doc");
        }

        header("Content-Disposition: attachment; filename=" . $candidate->getFullName() . '-cv.' . $extention);
        header("Content-Transfer-Encoding: binary");

        ob_clean();
        flush();

        return @readfile( base_path('/public/storage/candidates/' . $candidate->id . '/cvs/' . $candidate->cv->name));
    }
}
