<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public $table = 'news';

    public $fillable = [
        'file',
        'date',
        'deleted_at',
    ];

    public $timestamps = true;


    public function language()
    {
        return $this->hasMany(NewTranslation::class, 'new_id', 'id')->orderBy('locale');
    }


//    public function getFileAttribute($file)
//    {
//        return url("/file_uploaded/new/".$this->attributes['file']);
//    }

}
