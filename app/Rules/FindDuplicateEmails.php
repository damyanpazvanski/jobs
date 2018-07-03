<?php

namespace App\Rules;

use App\Candidate;
use App\Http\Controllers\Ajax\CandidatesController;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class FindDuplicateEmails implements Rule
{

    protected $job;

    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $emails = CandidatesController::$EMAILS_LIST;

        $duplicatesInJob = Candidate::join('jobs_candidates', 'jobs_candidates.candidate_id', '=', 'candidates.id')
            ->whereIn('email', $emails)
            ->where('job_id', $this->job->id)
            ->count();

        if ($duplicatesInJob) {
            return false;
        }

        $emailsCounts = array_count_values($emails);

        foreach ($emailsCounts as $count) {
            if ($count > 1) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.find_duplicate_emails');
    }
}
