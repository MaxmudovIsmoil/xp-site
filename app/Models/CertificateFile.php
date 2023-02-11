<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateFile extends Model
{
    use HasFactory;

    public $table = 'certificate_files';

    public $fillable = [
        'certificate_id',
        'file',
        'name'
    ];

    public $timestamps = false;


//    public function getFileAttribute($file)
//    {
//        return url("/file_uploaded/certificate/".$this->attributes['file']);
//    }

}
