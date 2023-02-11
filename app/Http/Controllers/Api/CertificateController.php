<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\CertificateTranslation;
use App\Models\CertificateFile;
use App\Http\Resources\CertificateResource;
use App\Http\Controllers\Controller;


class CertificateController extends Controller
{


    public function index($locale = 'uz')
    {
        try {
            $certificate = CertificateTranslation::select('certificate_id', 'locale', 'name', 'description')
            ->where('locale', $locale)
            ->with('files')
            ->orderBy('certificate_id', 'DESC')
            ->get();

            return $certificate;
        }
        catch(\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }


}
