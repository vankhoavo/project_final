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
            'first_and_last_name'   => 'required|min:2|max:20',
            'email' => 'required|email',
            'password'  => 'required|min:6',
            're_password'  => 'required|same:password',
            'phone_number'  => 'required|digits:10',
        ];
    }
}
