<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class LoginCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'         =>  'required|email',
            'password'      =>  'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }
}
