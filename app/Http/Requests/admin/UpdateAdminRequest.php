<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:admins,id',
            'first_and_last_name'       => 'required|min:2|max:20',
            'phone_number'      => 'required|digits:10',
            'date_of_birth'     => 'required|date',
            'rule_id'       => 'required',
        ];
    }
}
