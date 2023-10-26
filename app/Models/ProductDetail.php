<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

//    public $table = 'product_details';

    public $fillable = [
        'product_id',
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
    }

    public function language()
    {
        return $this->hasMany(ProductDetailTranslation::class, 'product_detail_id', 'id');
    }
}
