<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'parent_id' => 'required',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'image' => 'image',
                    'name_en' => 'required',
                    'name_ar' => 'required',
//                    'parent_id' => 'required',
                ];

        }
    }
}
