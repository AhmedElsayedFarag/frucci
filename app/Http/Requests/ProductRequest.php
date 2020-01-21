<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        switch ($this->method()){
            case 'GET':
            case 'DELETE':
                return [];

            case 'POST':
                return [
                    'thumbnail' => 'required|image',
                    'name_ar' => 'required',
                    'name_en' => 'required',
                    'description_ar' => 'required',
                    'description_en' => 'required',
                    'short_description_ar' => 'required',
                    'short_description_en' => 'required',
                    'price_before' => 'nullable|numeric|min:1',
                    'price_after' => 'nullable|numeric|min:1',
                    'colors' => 'nullable',
                    'status' => 'required|boolean',
                    'quantity' => 'required|numeric|min:0',
                    'serial_number' => 'required|numeric|min:0',
                    'pattern_ar' => 'required',
                    'pattern_en' => 'required',
                    'material_ar' => 'required',
                    'material_en' => 'required',
                    'size_ar' => 'required',
                    'size_en' => 'required',
                    'brand_id' => 'required',

                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'thumbnail' => 'image',
                    'name_ar' => 'required',
                    'name_en' => 'required',
                    'description_ar' => 'required',
                    'description_en' => 'required',
                    'short_description_ar' => 'required',
                    'short_description_en' => 'required',
                    'price_before' => 'nullable|numeric|min:1',
                    'price_after' => 'nullable|numeric|min:1',
                    'colors' => 'nullable',
                    'status' => 'required|boolean',
                    'quantity' => 'required|numeric|min:0',
                    'serial_number' => 'required|numeric|min:0',
                    'pattern_ar' => 'required',
                    'pattern_en' => 'required',
                    'material_ar' => 'required',
                    'material_en' => 'required',
                    'size_ar' => 'required',
                    'size_en' => 'required',
                    'brand_id' => 'required',
                ];

        }
    }
}
