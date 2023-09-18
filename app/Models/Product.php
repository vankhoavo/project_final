<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'slug_product',
        'picture',
        'short_description',
        'detailed_description',
        'quantity',
        'status',
        'price_sell',
        'price_discount',
        'id_product_type',
        'id_brand',
    ];
}
