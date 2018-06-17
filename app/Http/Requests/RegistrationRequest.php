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
        switch ($this->route()->getActionMethod()) {
            case 'userInformation':
                return [
                    'firstName' => 'required|string|min:2|max:255',
                    'lastName' => 'required|string|min:2|max:255',
                    'email' => 'required|string|email|max:255|unique:company_admins',
                    'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])+\w{8,}$/'
                ];
                break;
            case 'companyInformation';
                return [
                    'image' => 'nullable|image|mime:png,jpg,jpeg,gif|max:1024',
                    'name' => 'required|string|min:2|max:255',
                    'website' => 'nullable|active_url',
                    'business_sector' => 'required|integer|exists:business_sectors,id',
                    'country' => 'required|integer|exists:countries,id',
                    'city' => 'required|string|min:2|max:255',
                    'address' => 'required|string|min:2|max:255',
                    'phone' => ['required', 'string', 'min:8', 'max:15', 'regex:/^([\+]{1}[0-9]{5}|[0-9]{3})+([\-])([0-9]{3})([\-])([0-9]{3,8})$/u']
                ];
                break;
        }
    }
}
