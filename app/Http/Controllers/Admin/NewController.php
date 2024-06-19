<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NewRequest;
use App\Models\News;
use App\Models\NewTranslation;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{

    use HttpResponses;

    public function index()
    {
        $news = News::with('language')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('admin.new.index', compact('news'));
    }

    public function getOne(int $id): JsonResponse
    {
        $news = News::with('language')
            ->findOrFail($id);

        return $this->response(data: $news);
    }

    public function store(NewRequest $request)
    {
        DB::beginTransaction();

            if(!$request->hasfile('file'))
                return $this->error('file required');

            $file = $request->file('file');
            $file_name = date('Y-m-d_H-i-s')."_".rand(1, 10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/file_uploaded/new/', $file_name);

            $new_id = News::insertGetId([
                'file' => $file_name,
                'date' => date('Y-m-d', strtotime($request->date)),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $datas = [
                0 => [
                    'new_id' => $new_id,
                    'locale' => 'en',
                    'name' => $request->name_en,
                    'description' => $request->description_en,
                ],
                1 => [
                    'new_id' => $new_id,
                    'locale' => 'ru',
                    'name' => $request->name_ru,
                    'description' => $request->description_ru,
                ],
                2 => [
                    'new_id' => $new_id,
                    'locale' => 'uz',
                    'name' => $request->name_uz,
                    'description' => $request->description_uz,
                ]
            ];
            NewTranslation::insert($datas);

        DB::commit();

        return $this->response();
    }


    public function update(NewRequest $request, int $id)
    {
        DB::beginTransaction();
            $update_data = [
                'date' => date('Y-m-d', strtotime($request->date)),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if($request->hasfile('file')) {

                $file = $request->file('file');
                $file_name = date('Y-m-d_H-i-s')."_".rand(1, 10).'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/file_uploaded/new/', $file_name);

                $update_data = array_merge($update_data, ['file' => $file_name]);


                $old_file = explode('/', $request->old_file);
                $old_file = public_path().'/file_uploaded/new/'.end($old_file);
                if(file_exists($old_file))
                    unlink($old_file);
            }

            $new = News::findOrFail($id);
            $new->fill($update_data);
            $new->save();


            NewTranslation::where(['new_id' => $id])->delete();

            $datas = [
                0 => [
                    'new_id' => $id,
                    'locale' => 'en',
                    'name' => $request->name_en,
                    'description' => $request->description_en,
                ],
                1 => [
                    'new_id' => $id,
                    'locale' => 'ru',
                    'name' => $request->name_ru,
                    'description' => $request->description_ru,
                ],
                2 => [
                    'new_id' => $id,
                    'locale' => 'uz',
                    'name' => $request->name_uz,
                    'description' => $request->description_uz,
                ]
            ];
            NewTranslation::insert($datas);

        DB::commit();

        return $this->response();
    }



    public function destroy(int $id)
    {
        NewTranslation::where(['new_id' => $id])->delete();

        $cf = News::findOrFail($id);

        $file = public_path().'/file_uploaded/new/'.$cf->file;
        if(file_exists($file))
            unlink($file);

        $cf->delete();

        return $this->response(data: (object)['id' => $id]);
    }


}
