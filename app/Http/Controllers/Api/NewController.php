<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewTranslation;

class NewController extends Controller
{

    public function index($locale = 'uz')
    {
        try {

            $news = NewTranslation::select('new_id', 'locale', 'name', 'description')
            ->where('locale', $locale)
            ->with('files')
            ->orderBy('new_id', 'DESC')
            ->get();

            return $news;
        }
        catch(\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

}
