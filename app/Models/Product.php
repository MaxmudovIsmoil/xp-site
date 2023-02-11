<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'name_en',
        'name_ru',
        'name_uz',
        'text_en',
        'text_ru',
        'text_uz',
        'subcategory_id',
        'price',
        'photo',
        'model_number',
        'place_origin',
        'material',
        'oem',
        'certification',
        'popular',
    ];

    public $timestamps = true;

    public function subcategory()
    {
        return $this->hasOne(SubCategory::class, 'id', 'category_id');
    }

}
