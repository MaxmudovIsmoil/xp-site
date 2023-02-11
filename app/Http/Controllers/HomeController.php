<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewTranslation;
use App\Models\AboutTranslation;
use App\Models\Carousel;
use App\Models\CertificateTranslation;

class HomeController extends Controller
{
    
    public function index($locale = 'uz')
    {
        $carousel = Carousel::select('file')->orderBy('number')->orderBy('id', 'DESC')->get();
        
        $certificate = CertificateTranslation::where('locale', $locale)->with('files')->orderBy('id', 'DESC')->first();


        $news = NewTranslation::select('new_id', 'locale', 'name', 'description')
                ->where('locale', $locale)
                ->with('files')
                ->orderBy('new_id', 'DESC')
                ->get();


        return view('pages.index', compact('carousel', 'news', 'certificate'));
    }


    public function about($locale = 'uz')
    {
        $about = AboutTranslation::select('about_id', 'locale', 'description')
                ->where('locale', $locale)
                ->with('files')
                ->get();

        return view('pages.about', compact('about'));
    }


    public function news($locale = 'uz')
    {
        $news = NewTranslation::select('new_id', 'locale', 'name', 'description')
                ->where('locale', $locale)
                ->with('files')
                ->orderBy('new_id', 'DESC')
                ->get();

        return view('pages.news', compact('news'));
    }


    public function contact($locale = 'uz')
    {

        return view('pages.contact');
    }


    public function product($locale = 'uz')
    {

        return view('pages.product');
    }

    public function product_detail($locale = 'uz')
    {

        return view('pages.product-detail');
    }

    public function drivers($locale = 'uz')
    {

        return view('pages.drivers');
    }

}
