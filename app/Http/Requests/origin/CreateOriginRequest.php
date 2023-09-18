<?php

namespace App\Http\Requests\origin;

use Illuminate\Foundation\Http\FormRequest;

class CreateOriginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'origin_name'       => 'required|min:3',
            'slug_origin'       => 'required|min:3',
            'id_brand_name'     => 'required',
        ];
    }
}
