<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255',
            'website' => 'nullable|active_url',
            'business_sector_id' => 'required|integer|exists:business_sectors,id',
            'country_id' => 'required|integer|exists:countries,id',
            'city' => 'required|alpha|min:2|max:255',
            'address' => 'required|string|min:2|max:255',
            'phone' => ['required', 'string', 'min:8', 'max:15', 'regex:/^([\+]{1}[0-9]{5}|[0-9]{3})+([\-])([0-9]{3})([\-])([0-9]{3,8})$/u'],
            'description' => 'nullable|string|min:2|max:2000',
            'image' => 'nullable|image|mime:png,jpg,jpeg,gif|max:2048'
        ];
    }
}
