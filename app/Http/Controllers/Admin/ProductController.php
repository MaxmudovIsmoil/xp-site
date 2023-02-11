<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{

    public function index()
    {
        try {
            $product = Product::all();

            return $product;
        }
        catch(\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $request->validated($request->all());

            Product::create([
                'name' => $request->name,
                'model' => $request->model,
                'category_id' => $request->category_id,
            ]);

            return ['status' => true, 'msg' => 'successfully'];
        }
        catch(\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        try {

            return $product;
        }
        catch(\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validated($request->all());

            $product = Product::findOrFail($id);

            $product->fill([
                'name' => $request->name,
                'model' => $request->model,
                'category_id' => $request->category_id,
            ]);
            $product->save();

            return ['status' => true, 'msg' => 'successfully'];
        }
        catch(\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::findOrFail($id)->delete();

            return ['status' => true, 'msg' => 'successfully'];
        }
        catch(\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }
}
