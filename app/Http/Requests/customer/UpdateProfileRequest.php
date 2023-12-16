<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:customers,email,' . $this->id,
            'first_and_last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ];
    }
}
