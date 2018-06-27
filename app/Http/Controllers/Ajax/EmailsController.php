<?php

namespace App\Http\Controllers\Ajax;

use App\Job;
use App\Http\Controllers\Controller;
use App\SentIqTest;
use Carbon\Carbon;

class EmailsController extends Controller
{

    public function mark(Job $job)
    {
        $candidates = $job->candidates()->leftJoin('sent_iq_tests', 'sent_iq_tests.candidate_id', '=', 'candidates.id')
            ->select('candidates.*')->where('sent_iq_tests.candidate_id', null)->get();

        foreach ($candidates as $candidate) {
            $sentIqTest = new SentIqTest([
                'send_on' => Carbon::now()
            ]);
            $sentIqTest->candidate()->associate($candidate);
            $sentIqTest->save();
        }
    }
}
