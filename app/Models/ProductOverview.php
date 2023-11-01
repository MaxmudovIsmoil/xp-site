<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOverview extends Model
{
    use HasFactory;

    public $table = 'product_overviews';

    public $fillable = [
        'product_id',
        'status',
    ];

    public $timestamps = true;

    public function language()
    {
        return $this->hasMany(ProductOverviewTranslation::class, 'product_overview_id', 'id');
    }
}
