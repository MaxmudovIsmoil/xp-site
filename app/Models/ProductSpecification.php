<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

    public $table = 'product_specifications';

    public $fillable = [
        'product_id',
        'key_en',
        'key_ru',
        'key_uz',
        'value_en',
        'value_ru',
        'value_uz'
    ];

    public $timestamps = true;




}
