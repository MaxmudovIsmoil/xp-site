<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductOverviewTranslation;
use App\Models\ProductServiceSupport;
use App\Models\ProductServiceSupportTranslation;
use App\Traits\HttpResponses;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductServiceSupportController extends Controller
{
    use HttpResponses;
    public function store(Request $request)
    {
        try {
            // return response()->json(['res' => $request->all()]);
            DB::beginTransaction();
                $product_service_support_id = ProductServiceSupport::insertGetId([
                    'product_id' => $request->product_id,
                ]);

                $data = [
                    0 => [
                        'product_service_support_id' => $product_service_support_id,
                        'locale' => 'en',
                        'name' => $request->name_en,
                        'description' => $request->description_en,
                    ],
                    1 => [
                        'product_service_support_id' => $product_service_support_id,
                        'locale' => 'ru',
                        'name' => $request->name_ru,
                        'description' => $request->description_ru,
                    ],
                    2 => [
                        'product_service_support_id' => $product_service_support_id,
                        'locale' => 'uz',
                        'name' => $request->name_uz,
                        'description' => $request->description_uz,
                    ]
                ];
                ProductServiceSupportTranslation::insert($data);
            DB::commit();
            return $this->success();
        }
        catch(\Exception $e)  {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }

    public function one(int $id) {
        try {
            $product_service_support = ProductServiceSupport::where(['id' => $id])
                ->with('language')
                ->first();

            return $this->success($product_service_support);
        }
        catch (\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }

    public function update(Request $request, int $product_service_support_id)
    {
        try {
             // return response()->json(['res' => $request->all(), 'id' => $product_service_support_id]);
            DB::beginTransaction();
                ProductServiceSupportTranslation::where(['product_service_support_id' => $product_service_support_id])
                    ->delete();

                $data = [
                    0 => [
                        'product_service_support_id' => $product_service_support_id,
                        'locale' => 'en',
                        'name' => $request->name_en,
                        'description' => $request->description_en,
                    ],
                    1 => [
                        'product_service_support_id' => $product_service_support_id,
                        'locale' => 'ru',
                        'name' => $request->name_ru,
                        'description' => $request->description_ru,
                    ],
                    2 => [
                        'product_service_support_id' => $product_service_support_id,
                        'locale' => 'uz',
                        'name' => $request->name_uz,
                        'description' => $request->description_uz,
                    ]
                ];
                ProductServiceSupportTranslation::insert($data);
            DB::commit();

            return $this->success();
        }
        catch(\Exception $e)  {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }

    public function destroy(int $product_service_support_id): JsonResponse
    {
        try {
            ProductServiceSupportTranslation::where(['product_service_support_id' => $product_service_support_id])
                ->delete();
            ProductServiceSupport::destroy($product_service_support_id);
            return $this->success(data: (object)['id' => $product_service_support_id]);
        }
        catch(\Exception $e) {
            return $this->error($e->getMessage(), code: $e->getCode());
        }
    }

}
