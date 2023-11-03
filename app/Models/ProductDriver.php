<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDriver extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'driver_id',
    ];

    public $timestamps = false;

//    public $table = 'product_drivers';

    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }
}
