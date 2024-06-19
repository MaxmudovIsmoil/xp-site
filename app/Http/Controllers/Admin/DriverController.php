<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverStoreRequest;
use App\Http\Requests\DriverUpdateRequest;
use App\Models\Product;
use App\Models\ProductDriver;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use App\Models\Driver;
use App\Models\DriverTranslation;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{

    use HttpResponses;

    public function index()
    {
        $products = Product::get();

        $drivers = Driver::with('language')
            ->orderBy('created_at', 'DESC')
            ->paginate(50);

        return view('admin.driver.index',
            compact('products', 'drivers')
        );
    }

    public function getOne(int $id): JsonResponse
    {
        $driver = Driver::with('language')
            ->findOrFail($id);

        return $this->response(data: $driver);
    }

    public function store(DriverStoreRequest $request)
    {
        DB::beginTransaction();

        if(!$request->hasfile('file'))
            return $this->error('required');

        $file = $request->file('file');
        $file_name = date('Y-m-d_H-i-s')."_".rand(1, 10).'.'.$file->getClientOriginalExtension();
        $file->move(public_path().'/file_uploaded/driver/', $file_name);

        $driver_id = Driver::insertGetId([
            'system' => $request->system,
            'file' => $file_name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($request->product_id !== null) {
            ProductDriver::create([
                'product_id' => (int) $request->product_id,
                'driver_id' => $driver_id
            ]);
        }

        $datas = [
            0 => [
                'driver_id' => $driver_id,
                'locale' => 'en',
                'name' => $request->name_en,
                'description' => $request->description_en,
            ],
            1 => [
                'driver_id' => $driver_id,
                'locale' => 'ru',
                'name' => $request->name_ru,
                'description' => $request->description_ru,
            ],
            2 => [
                'driver_id' => $driver_id,
                'locale' => 'uz',
                'name' => $request->name_uz,
                'description' => $request->description_uz,
            ]
        ];
        DriverTranslation::insert($datas);

        DB::commit();

        return $this->response();

    }


    public function update(DriverUpdateRequest $request, int $id)
    {
        DB::beginTransaction();
            $update_data = [
                'system' => $request->system,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if($request->hasfile('file')) {

                $file = $request->file('file');
                $file_name = date('Y-m-d_H-i-s')."_".rand(1, 10).'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/file_uploaded/driver/', $file_name);

                $update_data = array_merge($update_data, ['file' => $file_name]);


                $old_file = explode('/', $request->old_file);
                $old_file = public_path().'/file_uploaded/driver/'.end($old_file);
                if(file_exists($old_file))
                    unlink($old_file);
            }

            $driver = Driver::findOrFail($id);
            $driver->fill($update_data);
            $driver->save();

            ProductDriver::where(['driver_id' => $id])->delete();
            if($request->product_id !== null) {
                ProductDriver::Create([
                    'product_id' => (int) $request->product_id,
                    'driver_id' => $id
                ]);
            }


            DriverTranslation::where(['driver_id' => $id])->delete();

            $datas = [
                0 => [
                    'driver_id' => $id,
                    'locale' => 'en',
                    'name' => $request->name_en,
                    'description' => $request->description_en,
                ],
                1 => [
                    'driver_id' => $id,
                    'locale' => 'ru',
                    'name' => $request->name_ru,
                    'description' => $request->description_ru,
                ],
                2 => [
                    'driver_id' => $id,
                    'locale' => 'uz',
                    'name' => $request->name_uz,
                    'description' => $request->description_uz,
                ]
            ];
            DriverTranslation::insert($datas);

        DB::commit();

        return $this->response();
    }



    public function destroy(int $id)
    {
        DriverTranslation::where(['driver_id' => $id])->delete();

        $d = Driver::findOrFail($id);

        $file = public_path().'/file_uploaded/new/'.$d->file;
        if(file_exists($file))
            unlink($file);

        $d->delete();

        return $this->response(data: (object)['id' => $id]);
    }


}
