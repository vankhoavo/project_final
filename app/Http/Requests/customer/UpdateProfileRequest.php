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
            'first_and_last_name' => 'required|unique:customers,first_and_last_name,' . $this->id,
            'phone_number' => 'required|unique:customers,phone_number,' . $this->id,
            'address' => 'required|unique:customers,address,' . $this->id,
        ];
    }
}
