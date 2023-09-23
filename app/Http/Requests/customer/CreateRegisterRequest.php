<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_and_last_name'   => 'required|min:3',
            'email' => 'required|email|unique:customers,email',
            'password'  => 'required|string|min:6|max:35|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@!$%&*]/',
            're_password'  => 'required|same:password',
            'phone_number'  => 'required|digits:10',
            'provider'      => 'required',
            'provider_id'    => 'required',
        ];
    }
}
