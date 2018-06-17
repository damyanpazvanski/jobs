<?php

namespace App\Rules;

use App\Candidate;
use App\Collaborator;
use App\Manager;
use App\Questionnaire;
use function foo\func;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TrimEmails implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //TODO: prepare emails list


        foreach (trimEmails($value) as $email) {
            $validator = filter_var($email, FILTER_VALIDATE_EMAIL);

            if ($validator === false) {
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
