<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateTranslation extends Model
{
    use HasFactory;


    public $table = 'certificate_translations';


    public $fillable = [
        'certificate_id',
        'locale',
        'name',
        'description',
    ];


    public $timestamps = false;


    public function certificate()
    {
        return $this->hasOne(Certificate::class, 'id', 'certificate_id');
    }


    // for api controller
    public function files()
    {
        return $this->hasMany(CertificateFile::class, 'certificate_id', 'certificate_id');
    }

}
