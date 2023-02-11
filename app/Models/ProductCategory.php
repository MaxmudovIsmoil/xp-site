<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    public $fillable = [
        'name_en',
        'name_ru',
        'name_uz',
        'deleted_at',
    ];

    public $timestamps = true;


}
