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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'address' => 'required|max:255',
            'birthday' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('en.validate.name'),
            'email.required' => trans('en.validate.email'),
            'email.email' => trans('en.validate.valid_email'),
            'phone_number.required' => trans('en.validate.phone_number'),
            'address.required' => trans('en.validate.address'),
            'password.required' => trans('en.validate.password'),
            'password.min' => trans('en.validate.valid_password'),
        ];
    }
}
