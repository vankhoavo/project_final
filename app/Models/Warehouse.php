<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    protected $fillable = [
        'id_product',
        'product_name',
        'input_unit_price',
        'input_quantity',
        'entry_warehouse',
        'is_warehouse',
    ];
}
