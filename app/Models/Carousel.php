<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    public $table = 'carousels';

    public $fillable = [
        'number',
        'file',
    ];

    public $timestamps = false;


//    public function getFileAttribute($file)
//    {
//        return url("/file_uploaded/carousel/".$this->attributes['file']);
//    }

}
