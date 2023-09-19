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
            'password'      =>  'required|min:6',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'email.*'         =>  'rtyrty',
    //         'password.*'      =>  'dấd',
    //         'g-recaptcha-response.*'  => 'captcha',
    //     ];
    // }
}
