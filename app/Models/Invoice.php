<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = '';
    protected $fillable = [
        'invoice_code',
        'recipient_name',
        'buyer_name',
        'email_name',
        'receiving_phone_number',
        'receiving_address',
        'payment',
        'total_money',
    ];
}
