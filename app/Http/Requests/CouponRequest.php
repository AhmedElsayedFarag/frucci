<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CouponRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        if ($request->type == 'percentage') {
            return [
                'coupon' => 'required|unique:coupons',
                'type' => 'required',
                'expire_date' => 'nullable|date|after_or_equal:today',
                'number_of_users' => 'nullable|numeric|min:1',
                'value' => 'required|numeric|min:0.01|max:0.99',
                'option' => 'required',
                'brand_id' => 'nullable',

            ];
        }else{
            return [
                'coupon' => 'required|unique:coupons',
                'type' => 'required',
                'expire_date' => 'nullable|date|after_or_equal:today',
                'number_of_users' => 'nullable|numeric|min:1',
                'value' => 'required|numeric|min:1|max:1000000',
                'option' => 'required',
                'brand_id' => 'nullable',
            ];

        }
            
       
    }
}
