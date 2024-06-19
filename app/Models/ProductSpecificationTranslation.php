<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecificationTranslation extends Model
{
    use HasFactory;

    public $table = 'product_specification_translations';

    public $fillable = [
        'product_specification_id',
        'locale',
        'key',
        'value1',
        'value2',
    ];

    public $timestamps = true;




}
