<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\News;
use App\Models\Product;
use App\Traits\LocaleTrait;
use Illuminate\Http\Request;
use App\Models\NewTranslation;
use App\Models\AboutTranslation;
use App\Models\Carousel;
use App\Models\CertificateTranslation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    use LocaleTrait;

    public function index()
    {
        $locale = $this->locale();

        $carousel = Carousel::select('file')
            ->orderBy('number')
            ->get();

        $certificate = CertificateTranslation::where(['locale' => $locale])
            ->with('files')
            ->orderBy('id', 'DESC')
            ->first();


        $news = News::with(['language' => function($query) use($locale) {
                    $query->where('locale', $locale);
                }])
            ->orderBy('id', 'DESC')
            ->get();

        $products = Product::where(['popular' => 1])
            ->orderBy('id', 'DESC')
            ->paginate(10);


        return view('pages.index',
            compact('carousel', 'products', 'news', 'certificate')
        );
    }



}
