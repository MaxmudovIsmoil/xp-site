<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
                'product_detail.language' => function($query) use ($locale) {
                    $query->where('locale', $locale);
                }])
            ->first();


        return view('pages.product-detail',
            compact('product')
        );
    }

}
