<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOverview;
use App\Models\ProductPhoto;
use App\Models\ProductServiceSupport;
use App\Traits\LocaleTrait;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    use LocaleTrait;

    public function index(int $id)
    {
        $locale = $this->locale();

        $product = Product::where(['id' => $id])
            ->with(['product_detail', 'product_detail.language' => function($query) use ($locale) {
                    $query->where('locale', $locale);
                }])
            ->first();

        $product_photos = ProductPhoto::where(['product_id' => $id])->get();

        $product_overviews = ProductOverview::where(['product_id' => $id])
            ->with(['language' => function($query) use ($locale) {
                    $query->where('locale', $locale);
            }])->get();

        $product_service_supports = ProductServiceSupport::where(['product_id' => $id])
            ->with(['language' => function($query) use ($locale) {
                $query->where('locale', $locale);
            }])->get();


        return view('pages.product-detail',
            compact('product', 'product_photos', 'product_overviews', 'product_service_supports')
        );
    }

}
