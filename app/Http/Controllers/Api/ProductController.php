<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $product = Product::all();

            return ProductResource::collection($product);
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

            return new ProductResource($product);
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
