<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOverview extends Model
{
    use HasFactory;

    public $table = 'product_overviews';

    public $fillable = [
        'name_en',
        'name_ru',
        'name_uz',
        'product_id',
    ];

    public $timestamps = true;

}
