<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
        $rules = [
            'user.first_name' => 'required|alpha|min:2|max:255',
            'user.last_name' => 'required|alpha|min:2|max:255',
            'user.phone' => ['required', 'string', 'min:8', 'max:15', 'regex:/^([\+]{1}[0-9]{5}|[0-9]{3})+([\-])([0-9]{3})([\-])([0-9]{3,8})$/u'],
            'user.email' => 'required|string|email|max:255',

            'company.name' => 'required|string|min:2|max:255',
            'company.website' => 'nullable|active_url',
            'company.business_sector_id' => 'required|integer|exists:business_sectors,id',
            'company.country_id' => 'required|integer|exists:countries,id',
            'company.city' => 'required|string|min:2|max:255',
            'company.address' => 'required|string|min:2|max:255',
            'company.phone' => ['nullable', 'string', 'min:8', 'max:15', 'regex:/^([\+]{1}[0-9]{5}|[0-9]{3})+([\-])([0-9]{3})([\-])([0-9]{3,8})$/u'],
            'company.description' => 'nullable|string|min:2|max:2000',
            'company.image' => 'nullable|image|mime:png,jpg,jpeg,gif|max:2048',

            'card.trial' => 'nullable|boolean'
        ];

        switch ($this->route()->getActionMethod()) {
            case 'sendMessage':
                $rules['message'] = 'required|string|min:20|max:3000';
                break;
            case 'store':
                $rules['card.trial'] = 'boolean';
                break;
        }

        return $rules;
    }
}
