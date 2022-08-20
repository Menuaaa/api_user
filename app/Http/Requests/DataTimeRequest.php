<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataTimeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'data' => 'required',
            'time' => 'required',
            'location' => 'required',
            'service_id' => 'nullable',
            'service' => 'nullable'
        ];
    }
}
