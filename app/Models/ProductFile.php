<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFile extends Model
{
    use HasFactory;

    public $table = 'product_files';

    public $fillable = [
        'product_id',
        'file',
    ];

    public $timestamps = true;
}
