<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDriver;
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
            ->with([
                'product_detail',
                'product_driver',
                'product_detail.language' => function($query) use ($locale) {
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


    public function driver(int $product_id)
    {
        $model = Product::findOrFail($product_id)->model;

        $drivers = ProductDriver::where(['product_id' => $product_id])
            ->with('driver')
            ->get();

        return view('pages.product-drivers',
            compact('drivers', 'model', 'product_id')
        );
    }

}
