<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    use HasFactory;

    public $table = 'about_translations';

    public $fillable = [
        'about_id',
        'locale',
        'description',
    ];

    public $timestamps = false;


    // for api controller
    public static function insert(array $datas)
    {
    }

    public function files()
    {
        return $this->hasMany(AboutFile::class, 'about_id', 'about_id');
    }

}
