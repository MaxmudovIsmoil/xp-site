<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;

class CarouselApiController extends Controller
{
    public function index()
    {
        try {
            $carousel = Carousel::select('file')->orderBy('number')->orderBy('id', 'DESC')->get();

            return $carousel;
        }
        catch(\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }
}
