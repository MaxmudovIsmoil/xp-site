<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

//    public $table = 'abouts';

    public $fillable = [
        'image',
        'deleted_at',
    ];

    public $timestamps = true;


    public function language()
    {
        return $this->hasMany(AboutTranslation::class, 'about_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(AboutFile::class, 'about_id', 'id');
    }


}
