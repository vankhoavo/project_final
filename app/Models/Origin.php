<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    use HasFactory;
    protected $table = 'origins';
    protected $fillable = [
        'origin_name',
        'slug_origin',
        'id_brand_name',
    ];
}
