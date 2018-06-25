<?php

namespace App\Http\Controllers;

use App\Job;
use App\Candidate;


class CandidatesController extends Controller
{

    public function show(Job $job, Candidate $candidate)
    {
        return view('candidates.show', compact('job', 'candidate'));
    }
}
