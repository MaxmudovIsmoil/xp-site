<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    use HasFactory;

//    public $table = 'service_translations';

    public $fillable = [
        'service_id',
        'locale',
        'name',
        'description',
    ];

    public $timestamps = false;

}
