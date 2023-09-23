<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $table = 'invoice_details';
    protected $fillable = [
        'id_product',
        'id_customer',
        'id_invoice',
        'is_invoice',
        'unit_price',
        'quantity',
        'into_money',
    ];
}
