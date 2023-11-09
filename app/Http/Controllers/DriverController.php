<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Traits\LocaleTrait;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    use LocaleTrait;

    public function index()
    {
        $locale = $this->locale();

        $drivers = Driver::with(['language' => function($query) use($locale) {
            $query->where('locale', '=', $locale);
        }])->get();


        return view('pages.drivers',
            compact('drivers')
        );
    }

}
