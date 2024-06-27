<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Traits\LocaleTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use LocaleTrait;
    public function index(int $category_id = null)
    {
        $product_category = ProductCategory::get();

        if ($category_id === null)
            $category_id = isset($product_category[0]) ? $product_category[0]->id : null;

        $products = Product::where('category_id', $category_id)->paginate(50);


        return view('pages.product',
            compact('product_category', 'products')
        );
    }


    public function one()
    {
        return 'product-one';
    }

}
