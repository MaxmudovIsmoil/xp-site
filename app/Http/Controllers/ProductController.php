<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Traits\LocaleTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use LocaleTrait;
    public function index()
    {
        $locale = $this->locale();

        $product_category = ProductCategory::get();

        return view('pages.product', compact('product_category'));
    }


    public function one()
    {
        return 'product-one';
    }

}
