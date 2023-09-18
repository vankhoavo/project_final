<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_update' => 'required|exists:brands,id',
            'brand_name_update'    => 'required|min:3|max:20',
            'slug_brand_update'   => 'required|min:3|max:20',
        ];
    }
}
