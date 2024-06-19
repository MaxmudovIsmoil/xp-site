<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSpecificationStoreRequest;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationTranslation;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductSpecificationController extends Controller
{

    use HttpResponses;
    public function store(ProductSpecificationStoreRequest $request, int $product_id)
    {
        if (!empty($request->ProductST)){
            foreach ($request->ProductST as $item) {
                $ps_id = ProductSpecification::insertGetId([
                    'product_id' => $product_id,
                    'order' => $item['order']
                ]);
                ProductSpecificationTranslation::insert([
                    [
                        'product_specification_id' => $ps_id,
                        'locale' => 'en',
                        'key' => $item['en']['key'],
                        'value1' => $item['en']['value1']??'',
                        'value2' => $item['en']['value2']??'',
                    ],
                    [
                        'product_specification_id' => $ps_id,
                        'locale' => 'ru',
                        'key' => $item['ru']['key'],
                        'value1' => $item['ru']['value1']??'',
                        'value2' => $item['ru']['value2']??'',
                    ],
                    [
                        'product_specification_id' => $ps_id,
                        'locale' => 'uz',
                        'key' => $item['uz']['key'],
                        'value1' => $item['uz']['value1']??'',
                        'value2' => $item['uz']['value2']??'',
                    ],
                ]);
            }
        }
        dd('ok');

        return response()->json(['res' => $request->all()]);

    }


    public function update(Request $request, int $id)
    {
        return response()->json(['res' => $request->all()]);
//       return $this->response();
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json(['id' => $id]);
//            return $this->response();
    }
}
