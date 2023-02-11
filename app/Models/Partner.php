<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    public $fillable = [
        'name_en',
        'name_ru',
        'name_uz',
        'text_en',
        'text_ru',
        'text_uz',
        'link',
    ];

    public $timestamps = true;


}
