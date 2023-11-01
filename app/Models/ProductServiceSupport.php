<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServiceSupport extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
    ];

    public $timestamps = true;

    public function language()
    {
        return $this->hasMany(ProductServiceSupportTranslation::class, 'product_service_support_id', 'id');
    }
}
