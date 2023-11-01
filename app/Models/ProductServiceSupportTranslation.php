<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServiceSupportTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'product_service_support_id',
        'locale',
        'name',
        'description'
    ];

    public $timestamps = false;
}
