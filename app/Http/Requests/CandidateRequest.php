<?php

namespace App\Http\Requests;

use App\Rules\FindDuplicateEmails;
use App\Rules\TrimEmails;
use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
