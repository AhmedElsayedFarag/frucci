<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                    'link' => 'nullable|url',
                    'head_ar' => 'nullable',
                    'head_en' => 'nullable',
                    'link_title_ar' => 'nullable',
                    'link_title_en' => 'nullable',


                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'image' => 'image',
                    'link' => 'nullable|url',
                    'head_ar' => 'nullable',
                    'head_en' => 'nullable',
                    'link_title_ar' => 'nullable',
                    'link_title_en' => 'nullable',


                ];

        }
    }
}
