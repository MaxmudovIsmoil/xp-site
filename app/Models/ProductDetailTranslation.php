<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'product_detail_id',
        'locale',
        'key',
        'value',
    ];

    public $timestamps = false;

}
