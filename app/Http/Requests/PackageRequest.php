<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
                    'image' => 'required|image',
                    'name_ar' => 'required',
                    'name_en' => 'required',
                    'price' => 'required|numeric',
                    'product_id' => 'required',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'image' => 'image',
                    'name_ar' => 'required',
                    'name_en' => 'required',
                    'price' => 'required|numeric',
                    'product_id' => 'required',
                ];

        }
    }
}
