<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use App\Http\Requests\AboutRequest;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\AboutFile;
use App\Models\AboutTranslation;
use Illuminate\Support\Facades\DB;


class AboutController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $about = About::with('language', 'files')->orderBy('created_at', 'DESC')->first();

        return view('admin.about.index', compact('about'));
    }


    public function update(AboutRequest $request, $id)
    {
        $request->validated($request->all());

        try {
            DB::beginTransaction();
                AboutTranslation::where('about_id', $id)->delete();

                $datas = [
                    0 => [
                        'about_id' => $id,
                        'locale' => 'en',
                        'description' => $request->description_en,
                    ],
                    1 => [
                        'about_id' => $id,
                        'locale' => 'ru',
                        'description' => $request->description_ru,
                    ],
                    2 => [
                        'about_id' => $id,
                        'locale' => 'uz',
                        'description' => $request->description_uz,
                    ]
                ];
                AboutTranslation::insert($datas);
            DB::commit();

            return $this->success();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            return $this->error($exception->getMessage());
        }
    }


    public function file_upload(Request $request)
    {
        try {
            if(!$request->hasfile('file'))
                return $this->error('file required');

            $files = $request->file('file');

            foreach ($files as $file) {

                $file_name = date('Y-m-d_H-i-s')."_".rand(1, 10).'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/file_uploaded/about/', $file_name);
                $data[] = [
                    'about_id'  => $request->about_id,
                    'file'      => $file_name,
                ];
            }

            AboutFile::insert($data);

            return $this->success();
        }
        catch(Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }


    public function file_delete($id)
    {
        try {

            $cf = AboutFile::findOrFail($id);

            $file = public_path().'/file_uploaded/about/'.$cf->file;

            if(file_exists($file))
                unlink($file);

            $cf->delete();

            return $this->success(['id' => $id]);
        }
        catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }


}
