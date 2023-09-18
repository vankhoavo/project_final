<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_and_last_name'       => 'required|min:2|max:20',
            'email'     => 'required|email|unique:admins,email',
            'phone_number'      => 'required|digits:10',
            'password'      => 'required|min:6|max:10',
            're_password'       => 'required|same:password',
            'date_of_birth'     => 'required|date',
            'rule_id'       => 'required',
        ];
    }
}
