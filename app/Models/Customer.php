<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'first_and_last_name',
        'email',
        'password',
        'phone_number',
        'hash_active',
        'ip',
        'hash_reset',
        'is_active',
        'is_block',
        'provider_id',
        'provider'
    ];
}
