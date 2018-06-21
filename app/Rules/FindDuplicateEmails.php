<?php

namespace App\Rules;

use App\Http\Controllers\Ajax\CandidatesController;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class FindDuplicateEmails implements Rule
{

    protected $jobId;

    public function __construct($jobId)
    {
        $this->jobId = $jobId;
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

        $duplicates = DB::table('candidates')
            ->join('jobs_candidates', 'jobs_candidates.candidate_id', '=', 'candidates.id')
            ->whereIn('email', $emails)
            ->orWhere('job_id', $this->jobId)
            ->count();

        if ($duplicates) {
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
