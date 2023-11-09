<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductSpecificationController extends Controller
{

    use HttpResponses;
    public function store(Request $request)
    {
        return response()->json(['res' => $request->all()]);
//        return $this->response();
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
