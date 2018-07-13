<?php

namespace App\Http\Controllers\Ajax;

use App\IqResult;
use App\Job;
use App\Candidate;
use App\JobsCandidates;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use Illuminate\Support\Facades\DB;

class CandidatesController extends Controller
{
    public static $EMAILS_LIST = [];

    public function store(Job $job, CandidateRequest $request)
    {
        DB::transaction(function () use ($job) {
            foreach (self::$EMAILS_LIST as $email) {
                $candidate = Candidate::firstOrCreate([
                    'email' => $email
                ]);

                $relationship = new JobsCandidates();

                $relationship->job()->associate($job);
                $relationship->candidate()->associate($candidate);
                $relationship->save();

                if (is_null($candidate->iqResult)) {
                    $result = new IqResult([
                        'status' => 'hold',
                        'allowed_attempts' => 2
                    ]);

                    $result->candidate()->associate($candidate);
                    $result->save();
                }
            }
        }, 2);

        return response()->json([]);
    }
}
