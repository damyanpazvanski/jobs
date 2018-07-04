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
        $method = $this->route()->getActionMethod();

        if ($method === 'validateEmail' || $method === 'attempt') {
            return [
                'email' => 'required|string|email|max:255|exists:candidates,email'
            ];
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
