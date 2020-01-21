<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    'image' => 'image',
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'email_verified_at' => 'nullable|date',
                    'password' => 'required',
                    'password_confirmation' => 'same:password',
                    'phone' => 'required|numeric|unique:users',
                ];




    }
}
