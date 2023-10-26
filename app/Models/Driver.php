<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    // public $table = 'drivers';

    public $fillable = [
        'name_en',
        'name_ru',
        'name_uz',
        'system',
        'file',
    ];

    public $timestamps = true;
}
