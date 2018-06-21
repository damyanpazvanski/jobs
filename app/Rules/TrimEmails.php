<?php

namespace App\Rules;

use App\Http\Controllers\Ajax\CandidatesController;
use Illuminate\Contracts\Validation\Rule;

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
        $emails = explode(',', $value);

        foreach ($emails as &$email) {
            $validator = filter_var(trim($email), FILTER_VALIDATE_EMAIL);

            if ($validator === false) {
                return false;
            }
        }

        CandidatesController::$EMAILS_LIST = $emails;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.trim_candidates_emails');
    }
}
