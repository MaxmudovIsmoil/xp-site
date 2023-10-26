<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecificationSubCategory extends Model
{
    use HasFactory;

    public $table = 'product_specification_sub_categories';

    public $fillable = [
        'product_id',
        'status',
        'name_en',
        'name_uz',
        'name_ru',
    ];

    public $timestamps = true;

}
