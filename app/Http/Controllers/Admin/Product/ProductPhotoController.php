<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductPhoto;
use App\Traits\HttpResponses;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductPhotoController extends Controller
{

    use HttpResponses;


    public function upload(Request $request, int $id)
    {
        try {
            if (!$request->hasFile('photo'))
                return $this->error(error: 'photo field');

            $photo = $request->file('photo');
            $photo_name = date('Y-m-d_H-i-s') . round(1, 10) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path() . '/file_uploaded/product/', $photo_name);

            ProductPhoto::create([
                'product_id' => $id,
                'photo' => $photo_name,
            ]);

            return $this->success();
        }
        catch (\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }


    public function destroy(Request $request, int $id): JsonResponse
    {
        try {

            if ($request->photo !== '') {
                $file = public_path().'/file_uploaded/product/'.$request->photo;
                if(file_exists($file))
                    unlink($file);

                ProductPhoto::where(['id' => $id])->delete();
            }
            return $this->success();
        }
        catch (\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }
}
