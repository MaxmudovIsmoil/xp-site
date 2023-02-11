<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public $table = 'sub_categories';

    public $fillable = [
        'name_en',
        'name_ru',
        'name_uz',
        'status',
        'category_id',
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
