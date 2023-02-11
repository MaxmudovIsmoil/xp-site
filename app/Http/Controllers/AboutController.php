<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutTranslation;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index($lang = 'uz')
    {
        $about = AboutTranslation::where('locale', $lang)->with( 'files')->first();

        return view('pages.about', compact('about'));
    }

}
