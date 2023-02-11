<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    // public $table = 'certificates';

    public $fillable = [
        'deleted_at',
    ];


    public $timestamps = true;


    public function language()
    {
        return $this->hasMany(CertificateTranslation::class, 'certificate_id', 'id');
    }


    public function files()
    {
        return $this->hasMany(CertificateFile::class, 'certificate_id', 'id');
    }


}
