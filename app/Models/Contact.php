<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // public $table = 'contact';

    public $fillable = [
        'phone',
        'email',
        'address',
        'image',
    ];

    public $timestamps = true;
}
