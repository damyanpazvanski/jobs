<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
        $rules = [];
        $method = $this->route()->getActionMethod();

        $rules['email'] = 'required|string|email|max:255|exists:candidates,email';

        if ($method === 'validateEmail' || $method === 'attempt') {
            return $rules;
        } else if ($method == 'candidateInformation') {
            $rules['first_name'] = 'required|alpha|min:2|max:255';
            $rules['last_name'] = 'required|alpha|min:2|max:255';
            $rules['phone'] = ['required', 'string', 'min:8', 'max:15', 'regex:/^([\+]{1}[0-9]{5}|[0-9]{3})+([\-])([0-9]{3})([\-])([0-9]{3,8})$/u'];
            $rules['cv'] = 'required';

            return $rules;
        }

        return [
            'email' => 'required|string|email|max:255|exists:candidates,email',
            'questions' => 'required|array',
            'questions.*.questionId' => 'nullable|integer|exists:questions,id',
            'questions.*.answerId' => 'nullable|integer|exists:answers,id',
            'bonus' => 'required|integer|between:-2,2'
        ];
    }
}
