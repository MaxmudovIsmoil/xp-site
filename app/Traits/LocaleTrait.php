<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

trait LocaleTrait
{
    public function locale(): string
    {
        if (!Session::has('locale')) {
            $locale = App::getLocale();
            Session::put('locale', $locale);
        }
        else
            $locale = Session::get('locale');

        return $locale;
    }
}
