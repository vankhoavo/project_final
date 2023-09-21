<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class CheckMailResetPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' =>  'required|exists:customers,email',
        ];
    }

    public function messages()
    {
        return [
            'email.*'   => 'Invalid email or never used account registration email!',
        ];
    }
}
