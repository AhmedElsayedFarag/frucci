<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'address_ar' => 'required',
            'address_en' => 'required',
            'working_times_ar' => 'required',
            'working_times_en' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'phone' => 'nullable|numeric|digits_between:10,14',
            'city_id' => 'required',
        ];
    }
}
