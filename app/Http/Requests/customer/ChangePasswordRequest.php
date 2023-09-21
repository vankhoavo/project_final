<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'hash_reset'    => 'required|exists:customers,hash_reset',
            'password'      => 'required|string|min:6|max:35|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@!$%&*]/',
            're_password'   => 'required|same:password',
        ];
    }
}
