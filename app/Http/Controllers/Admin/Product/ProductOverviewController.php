<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductOverview;
use App\Models\ProductOverviewTranslation;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductOverviewController extends Controller
{
    use HttpResponses;

    public function store(Request $request)
    {
        DB::beginTransaction();
            $product_overview_id = ProductOverview::insertGetId([
                'product_id' => $request->product_id,
                'status' => 1,
            ]);

            $data = [
                  0 => [
                      'product_overview_id' => $product_overview_id,
                      'locale' => 'en',
                      'name' => $request->name_en,
                  ],
                  1 => [
                        'product_overview_id' => $product_overview_id,
                        'locale' => 'ru',
                        'name' => $request->name_ru,
                  ],
                  2 => [
                        'product_overview_id' => $product_overview_id,
                        'locale' => 'uz',
                        'name' => $request->name_uz,
                  ]
            ];
            ProductOverviewTranslation::insert($data);
        DB::commit();

        return $this->response();
    }

    public function one(int $product_overview_id): JsonResponse
    {
        $po = ProductOverview::with('language')
            ->where(['id' => $product_overview_id])
            ->first();

        return $this->response(data: $po);

    }

    public function update(Request $request, int $product_overview_id)
    {
        DB::beginTransaction();
            ProductOverviewTranslation::where(['product_overview_id' => $product_overview_id])
            ->delete();

            $data = [
                0 => [
                    'product_overview_id' => $product_overview_id,
                    'locale' => 'en',
                    'name' => $request->name_en,
                ],
                1 => [
                    'product_overview_id' => $product_overview_id,
                    'locale' => 'ru',
                    'name' => $request->name_ru,
                ],
                2 => [
                    'product_overview_id' => $product_overview_id,
                    'locale' => 'uz',
                    'name' => $request->name_uz,
                ]
            ];
            ProductOverviewTranslation::insert($data);
        DB::commit();

        return $this->response();
    }

    public function destroy(int $product_overview_id): JsonResponse
    {

        ProductOverviewTranslation::where(['product_overview_id' => $product_overview_id])
            ->delete();
        ProductOverview::destroy($product_overview_id);

        return $this->response(data: (object)['id' => $product_overview_id]);
    }
}
