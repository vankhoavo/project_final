<?php

namespace App\Http\Requests\producttype;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_update' => 'required|exists:product_types,id',
            'product_type_name_update' => 'required|min:3|max:25|unique:product_types,product_type_name',
            'slug_product_type_update'   => 'required|min:3|max:25',
        ];
    }
}
