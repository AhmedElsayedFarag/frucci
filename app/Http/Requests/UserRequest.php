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
        $id = $this->route('user');
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];

            case 'POST':
                return [
                    'image' => 'image',
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'email_verified_at' => 'nullable|date',
                    'password' => 'required|min:6',
                    'password_confirmation' => 'same:password',
                    'phone' => 'required|numeric|digits_between:10,14|unique:users,phone',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'image' => 'image',
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,' . $id,
                    'email_verified_at' => 'nullable|date',
                    'password' => 'nullable|min:6',
                    'password_confirmation' => 'same:password',
                    'phone' => 'required|digits_between:10,14|unique:users,phone,' . $id,
                ];

        }

    }
}
