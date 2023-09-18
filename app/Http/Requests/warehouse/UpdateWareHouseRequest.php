<?php

namespace App\Http\Requests\warehouse;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWareHouseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'   => 'required|exists:warehouses,id',
            'input_quantity' => 'nullable|numeric|min:0',
            'input_unit_price'  => 'nullable|numeric|min:0',
        ];
    }
}
