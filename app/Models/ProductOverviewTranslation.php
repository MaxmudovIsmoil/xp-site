<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOverviewTranslation extends Model
{
    use HasFactory;

//    public $table = 'product_overview_translations';

    public $fillable = [
        'product_overview_id',
        'locale',
        'name',
    ];

    public $timestamps = true;

}
