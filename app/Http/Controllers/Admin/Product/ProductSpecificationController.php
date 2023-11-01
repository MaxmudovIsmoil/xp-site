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
        try {
            return response()->json(['res' => $request->all()]);
//            return $this->success();
        }
        catch(\Exception $e)  {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }


    public function update(Request $request, int $id)
    {
        try {
            return response()->json(['res' => $request->all()]);
//            return $this->success();
        }
        catch(\Exception $e)  {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            return response()->json(['id' => $id]);
        }
        catch(\Exception $e) {
            return $this->error($e->getMessage(), code: $e->getCode());
        }
    }
}
