<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutDriver extends Model
{
    use HasFactory;

    public $table = 'product_specifications';

    public $fillable = [
        'product_id',
        'driver_id',
    ];

    public $timestamps = true;

}
