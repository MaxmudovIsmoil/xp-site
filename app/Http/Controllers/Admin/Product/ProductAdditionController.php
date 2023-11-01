<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOverview;
use App\Models\ProductPhoto;
use App\Models\ProductServiceSupport;
use Illuminate\Http\Request;

class ProductAdditionController extends Controller
{

    public function index(int $id)
    {
        $model = Product::findOrFail($id)->model;

        $product_photos = ProductPhoto::where(['product_id' => $id])->get();

        $product_overviews = ProductOverview::where(['product_id' => $id])->get();

        $product_service_supports = ProductServiceSupport::where(['product_id' => $id])
            ->with('language')
            ->get();

        return view('admin.product.addition',
            compact('model', 'product_photos', 'product_overviews', 'id', 'product_service_supports')
        );
    }
}
