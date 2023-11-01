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
            $category_id = $product_category[0]->id;

        $products = Product::where(['category_id' => $category_id])->paginate(3);

        return view('pages.product', compact('product_category', 'products'));
    }


    public function one()
    {
        return 'product-one';
    }

}
