<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetail;
use App\Models\ProductDetailTranslation;
use App\Models\ProductOverview;
use App\Models\ProductPhoto;
use App\Models\ProductSpecification;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\objectEquals;

class ProductController extends Controller
{
    use HttpResponses;

    public function index(int $category_id)
    {
        Session::put('category_id', $category_id);

        $category = ProductCategory::whereNull('deleted_at')->get();

        $products = Product::where(['category_id' => $category_id])
            ->with('category')
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.product.index', compact('category', 'products'));
    }


    public function create()
    {
        $category = ProductCategory::whereNull('deleted_at')->get();

        return view('admin.product.create', compact('category'));
    }


    public function store(ProductStoreRequest $request)
    {
        try {
            $request->validated($request->all());

            $photo = $request->file('photo');
            $photo_name = date('Y-m-d_H-i-s') . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path() . '/file_uploaded/product/', $photo_name);

            $data = [
                'model' => $request->model,
                'category_id' => $request->category_id,
                'photo' => $photo_name
            ];
            $data = isset($request->popular)
                ? array_merge(['popular' => (int)$request->popular], $data)
                : $data;

            if ($request->has('pdf')) {
                $pdf = $request->file('pdf');
                $pdf_name = date('Y-m-d_H-i-s') . '.' . $pdf->getClientOriginalExtension();
                $pdf->move(public_path() . '/file_uploaded/product/', $pdf_name);
                $data = array_merge(['pdf' => $pdf_name], $data);
            }

            $key_count = count($request->key_en);

            DB::beginTransaction();
                $product_id = Product::insertGetId($data);

                for ($i = 0; $i < $key_count; $i++) {
                    $product_detail_id = ProductDetail::insertGetId(['product_id' => $product_id]);

                    ProductDetailTranslation::insert([
                        [
                            'product_detail_id' => $product_detail_id,
                            'locale' => 'en',
                            'key' => $request->key_en[$i],
                            'value' => $request->value_en[$i],
                        ],
                        [
                            'product_detail_id' => $product_detail_id,
                            'locale' => 'ru',
                            'key' => $request->key_ru[$i],
                            'value' => $request->value_ru[$i],
                        ],
                        [
                            'product_detail_id' => $product_detail_id,
                            'locale' => 'uz',
                            'key' => $request->key_uz[$i],
                            'value' => $request->value_uz[$i],
                        ],
                    ]);
                }
            DB::commit();

            return $this->success();
        }
        catch (\Exception $e) {
            DB::rollBack();
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }


    public function edit(int $category_id, int $id)
    {
        $category = ProductCategory::get();
        $product = Product::findOrFail($id);

        $product_detail = ProductDetail::where('product_id', $id)
            ->with('language')
            ->get();

        return view('admin.product.edit',
            compact('category','product', 'product_detail', 'id')
        );
    }


    public function update(ProductUpdateRequest $request, int $id)
    {
        try {
            $request->validated($request->all());

            $popular = isset($request->popular) ? "1" : "0";
            $data = [
                'model' => $request->model,
                'category_id' => $request->category_id,
                'popular' => $popular,
            ];

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photo_name = date('Y-m-d_H-i-s') . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path() . '/file_uploaded/product/', $photo_name);
                $data = array_merge(['photo' => $photo_name], $data);
            }

            if ($request->hasFile('pdf')) {
                $pdf = $request->file('pdf');
                $pdf_name = date('Y-m-d_H-i-s') . '.' . $pdf->getClientOriginalExtension();
                $pdf->move(public_path() . '/file_uploaded/product/', $pdf_name);
                $data = array_merge(['pdf' => $pdf_name], $data);
            }

            DB::beginTransaction();
                $product = Product::findOrFail($id);
                $product->fill($data);
                $product->save();

                ProductDetail::where(['product_id' => $id])->delete();

                $key_count = count($request->key_en);
                for ($i = 0; $i < $key_count; $i++) {
                    $product_detail_id = ProductDetail::insertGetId(['product_id' => $id]);

                    ProductDetailTranslation::insert([
                        [
                            'product_detail_id' => $product_detail_id,
                            'locale' => 'en',
                            'key' => $request->key_en[$i],
                            'value' => $request->value_en[$i],
                        ],
                        [
                            'product_detail_id' => $product_detail_id,
                            'locale' => 'ru',
                            'key' => $request->key_ru[$i],
                            'value' => $request->value_ru[$i],
                        ],
                        [
                            'product_detail_id' => $product_detail_id,
                            'locale' => 'uz',
                            'key' => $request->key_uz[$i],
                            'value' => $request->value_uz[$i],
                        ],
                    ]);
                }
            DB::commit();

            return $this->success();
        }
        catch(\Exception $e) {
            DB::rollBack();
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }


    public function destroy(int $id)
    {
        try {
            ProductDetail::where(['product_id' => $id])->get();
            ProductOverview::where(['product_id' => $id])->delete();
            ProductPhoto::where(['product_id' => $id])->delete();
            ProductSpecification::where(['product_id' => $id])->delete();

            Product::findOrFail($id)->delete();

            return $this->success(data: (object)['id' => $id]);
        }
        catch(\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }
}
