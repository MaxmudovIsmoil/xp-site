<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;


class ProductCategoryController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $categories = ProductCategory::orderBy('id', 'DESC')->get();

        return view('admin.product_category.index', compact('categories'));
    }


    public function getOne(int $id)
    {
        $product_category = ProductCategory::findOrFail($id);

        return $this->response(data: $product_category);
    }


    public function store(ProductCategoryRequest $request)
    {
        $request->validated($request->all());

        ProductCategory::create([
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'name_uz' => $request->name_uz,
        ]);

        return $this->response();
    }


    public function update(ProductCategoryRequest $request, int $id): JsonResponse
    {
        $request->validated($request->all());

        $product_category = ProductCategory::findOrFail($id);
        $product_category->fill([
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'name_uz' => $request->name_uz,
        ]);
        $product_category->save();

        return $this->response();
    }


    public function destroy(int $id)
    {
        $pc = ProductCategory::findOrFail($id);
        $pc->delete();

        return $this->response(data: (object)['id' => $id]);
    }

}
