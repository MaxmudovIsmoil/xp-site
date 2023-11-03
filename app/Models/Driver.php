<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    // public $table = 'drivers';

    public $fillable = [
        'system',
        'file',
    ];

    public $timestamps = true;

    public function language()
    {
        return $this->hasMany(DriverTranslation::class, 'driver_id', 'id');
    }
}
