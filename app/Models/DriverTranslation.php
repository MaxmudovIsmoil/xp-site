<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverTranslation extends Model
{
    use HasFactory;

//     public $table = 'driver_translations';

    public $fillable = [
        'driver_id',
        'name',
        'description',
    ];

    public $timestamps = false;

    public function language()
    {
        return $this->hasMany(DriverTranslation::class, 'driver_id', 'id');
    }
}
