<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\ServiceTranslation;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{

    use HttpResponses;

    public function index()
    {
        $services = Service::with('language')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('admin.service.index',
            compact('services')
        );
    }

    public function getOne(int $id): JsonResponse
    {
        try {
            $service = Service::with('language')->findOrFail($id);

            return $this->success(data: $service);
        }
        catch (\Exception $e) {
           return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }

    public function store(ServiceRequest $request)
    {
        $request->validated($request->all());

        try {
            DB::beginTransaction();

                $service_id = Service::insertGetId([
                    'icon' => $request->icon,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $datas = [
                    0 => [
                        'service_id' => $service_id,
                        'locale' => 'en',
                        'name' => $request->name_en,
                        'description' => $request->description_en,
                    ],
                    1 => [
                        'service_id' => $service_id,
                        'locale' => 'ru',
                        'name' => $request->name_ru,
                        'description' => $request->description_ru,
                    ],
                    2 => [
                        'service_id' => $service_id,
                        'locale' => 'uz',
                        'name' => $request->name_uz,
                        'description' => $request->description_uz,
                    ]
                ];
                ServiceTranslation::insert($datas);

            DB::commit();

            return $this->success();
        }
        catch (\Exception $e) {
            DB::rollBack();
           return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }


    public function update(ServiceRequest $request, int $id)
    {
        $request->validated($request->all());
        try {
            DB::beginTransaction();

                $service = Service::findOrFail($id);
                $service->fill(['icon' => $request->icon]);
                $service->save();

                ServiceTranslation::where(['service_id' => $id])->delete();

                $datas = [
                    0 => [
                        'service_id' => $id,
                        'locale' => 'en',
                        'name' => $request->name_en,
                        'description' => $request->description_en,
                    ],
                    1 => [
                        'service_id' => $id,
                        'locale' => 'ru',
                        'name' => $request->name_ru,
                        'description' => $request->description_ru,
                    ],
                    2 => [
                        'service_id' => $id,
                        'locale' => 'uz',
                        'name' => $request->name_uz,
                        'description' => $request->description_uz,
                    ]
                ];
                ServiceTranslation::insert($datas);

            DB::commit();

            return $this->success();
         }
        catch (\Exception $e) {
            DB::rollBack();
           return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }



    public function destroy(int $id)
    {
        try {
            ServiceTranslation::where(['service_id' => $id])->delete();
            Service::destroy($id);

            return $this->success(data: (object)['id' => $id]);
        }
        catch (\Exception $e) {
           return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }


}
