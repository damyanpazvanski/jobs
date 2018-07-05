<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyAdminRequest extends FormRequest
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
            'phone' => ['required', 'string', 'min:8', 'max:15', 'regex:/^([\+]{1}[0-9]{5}|[0-9]{3})+([\-])([0-9]{3})([\-])([0-9]{3,8})$/u']
        ];
    }
}
