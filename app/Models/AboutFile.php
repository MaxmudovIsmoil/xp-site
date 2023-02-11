<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutFile extends Model
{
    use HasFactory;

    public $table = 'about_files';

    public $fillable = [
        'about_id',
        'file',
    ];

    public $timestamps = false;


//    public function getFileAttribute($file)
//    {
//        return url("/file_uploaded/about/".$this->attributes['file']);
//    }




}
