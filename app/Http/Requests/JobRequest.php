<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
        if ($this->route()->getActionMethod() === 'activate') {
            return [
                'job_id' => 'required|integer|exists:jobs,id'
            ];
        }

        return [
            'country_id' => 'required|integer|exists:countries,id',
            'position' => 'required|string|min:2|max:150',
            'work_time_id' => 'required|integer|exists:work_times,id',
            'city' => 'required|string|min:2|max:100'
        ];
    }
}
