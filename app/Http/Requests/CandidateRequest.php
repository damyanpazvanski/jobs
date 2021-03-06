<?php

namespace App\Http\Requests;

use App\Rules\TrimEmails;
use App\Rules\FindDuplicateEmails;
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
            'first_name' => 'required|alpha|min:2|max:255',
            'last_name' => 'required|alpha|min:2|max:255',
            'email' => 'required|email|max:255|exists:candidates,email',
            'cv' => 'nullable|mimes:doc,pdf,docx|max:20480',
            'phone' => ['required', 'string', 'min:8', 'max:15', 'regex:/^([\+]{1}[0-9]{5}|[0-9]{3})+([\-])([0-9]{3})([\-])([0-9]{3,8})$/u']
        ];
    }
}