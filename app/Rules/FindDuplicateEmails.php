<?php

namespace App\Rules;

use App\Candidate;
use App\Collaborator;
use App\Manager;
use App\Questionnaire;
use function foo\func;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class FindDuplicateEmails implements Rule
{

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
        $emails = trimEmails($value);

        $duplicates = Candidate::where('email', '')->first();

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
