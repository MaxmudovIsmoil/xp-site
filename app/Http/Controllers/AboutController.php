<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutTranslation;
use App\Traits\LocaleTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use LocaleTrait;

    public function index()
    {
        $locale = $this->locale();

        $about = About::with(['language' => function($query) use($locale) {
                    $query->where('locale', '=', $locale);
                }, 'files'])->first();

        return view('pages.about', compact('about'));
    }

}
