<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'category_id',
        'pdf',
        'photo',
        'video',
        'model',
        'popular',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
    }

    public function product_detail()
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }
}
