<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class LanguageController extends Controller
{
    public function change_locale(string $locale)
    {
        App::setlocale($locale);

        Session::put('locale', $locale);

        return redirect()->back();
    }

}
