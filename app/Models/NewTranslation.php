<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewTranslation extends Model
{
    use HasFactory;

    public $table = 'new_translations';

    public $fillable = [
        'new_id',
        'locale',
        'name',
        'description',
    ];

    public $timestamps = false;


    // for api controller
    public function files()
    {
        return $this->hasOne(News::class, 'id', 'new_id')->select('id', 'file', 'date');
    }



}
