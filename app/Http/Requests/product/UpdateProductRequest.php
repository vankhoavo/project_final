<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_update' =>  'required|exists:products,id',
            'product_name_update' => 'required|min:3|max:200',
            'product_type_name_update' => 'required',
            'brand_name_update' => 'required',
            'status_update' => 'required|boolean',
            'slug_product_name_update' => 'required|min:3|max:200',
            'price_sell_update' => 'required|numeric|min:0|max:100000000000',
            'price_discount_update' => 'required|numeric|min:0|max:100000000000|lte:price_sell_update',
            'image_update' => 'required',
            'short_description_update' => 'required|min:3',
            'detailed_description_update' => 'required|min:3',
        ];
    }
}
