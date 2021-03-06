<?php

namespace App\Http\Requests;

use App\Rules\TrimEmails;
use App\Rules\FindDuplicateEmails;
use Illuminate\Foundation\Http\FormRequest;

class CandidatesEmailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'candidates' => ['required', 'string', new TrimEmails(), new FindDuplicateEmails($this->route('job'))]
        ];
    }
}
