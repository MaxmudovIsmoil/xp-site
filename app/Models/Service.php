<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

//    public $table = 'services';

    public $fillable = [
        'icon',
    ];

    public $timestamps = true;


    public function language()
    {
        return $this->hasMany(ServiceTranslation::class, 'service_id', 'id')
            ->orderBy('locale');
    }

}
