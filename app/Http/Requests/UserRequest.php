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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|max:255',
            'phone_number' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('common.validate.require_name'),
            'email.required' => trans('common.validate.require_email'),
            'email.email' => trans('common.validate.valid_email'),
            'email.unique' => trans('common.validate.email_unique'),
            'phone_number.required' => trans('common.validate.require_phone_number'),
            'password.required' => trans('common.validate.require_password'),
            'password.min' => trans('common.validate.password_min'),
            'password.confirmed' => trans('common.validate.valid_password_confirm'),
        ];
    }
}
