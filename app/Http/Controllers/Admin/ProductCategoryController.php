<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use App\Http\Requests\ProductCategoryRequest;
use Illuminate\Http\Request;
use App\Models\ProductCategory;


class ProductCategoryController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $categories = ProductCategory::orderBy('id', 'DESC')->get();

        return view('admin.product_category.index', compact('categories'));
    }


    public function getOne($id)
    {
        try {
            $product_category = ProductCategory::findOrFail($id);

            return $this->success($product_category);
        }
        catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }


    public function store(ProductCategoryRequest $request)
    {
        $request->validated($request->all());

        try {
            ProductCategory::create([
                'name_en' => $request->name_en,
                'name_ru' => $request->name_ru,
                'name_uz' => $request->name_uz,
            ]);

            return $this->success();

        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }


    public function update(ProductCategoryRequest $request, $id)
    {
        $request->validated($request->all());

        try {
            $product_category = ProductCategory::findOrFail($id);
            $product_category->fill([
                'name_en' => $request->name_en,
                'name_ru' => $request->name_ru,
                'name_uz' => $request->name_uz,
            ]);
            $product_category->save();

            return $this->success();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            return $this->error($exception->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $pc = ProductCategory::findOrFail($id);
            $pc->delete();

            return $this->success(['id' => $id]);
        }
        catch (\Exception $exception) {

            if ($exception->getCode() == 23000)
                return response()->json(['status' => false, 'errors' => 'Ma\'lumotdan foydalanilyapti o\'chirish mumkin emas']);


            return $this->error($exception->getMessage());
        }
    }

}
