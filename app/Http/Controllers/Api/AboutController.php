<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\AboutTranslation;

class AboutController extends Controller
{

    public function index($locale = 'uz')
    {
        try {

            $about = AboutTranslation::select('about_id', 'locale', 'description')
            ->where('locale', $locale)
            ->with('files')
            ->get();

            return $about;
        }
        catch(\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

}
