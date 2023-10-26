<?php

namespace App\Http\Controllers;

use App\Traits\LocaleTrait;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    use LocaleTrait;

    public function index()
    {
        $locale = $this->locale();

        return view('pages.drivers');
    }

}
