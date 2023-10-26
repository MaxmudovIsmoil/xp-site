<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use App\Models\CertificateTranslation;
use App\Models\CertificateFile;
use Illuminate\Support\Facades\DB;


class CertificateController extends Controller
{

    use HttpResponses;


    public function index()
    {
        $certificate = Certificate::with('language', 'files')->orderBy('created_at', 'DESC')->first();

        return view('admin.certificate.index', compact('certificate'));
    }



    public function update(CertificateRequest $request, int $id)
    {
        $request->validated($request->all());

        try {
            DB::beginTransaction();
                CertificateTranslation::where('certificate_id', $id)->delete();

                $datas = [
                    0 => [
                        'certificate_id' => $id,
                        'locale' => 'en',
                        'name' => $request->name_en,
                        'description' => $request->description_en,
                    ],
                    1 => [
                        'certificate_id' => $id,
                        'locale' => 'ru',
                        'name' => $request->name_ru,
                        'description' => $request->description_ru,
                    ],
                    2 => [
                        'certificate_id' => $id,
                        'locale' => 'uz',
                        'name' => $request->name_uz,
                        'description' => $request->description_uz,
                    ]
                ];
                CertificateTranslation::insert($datas);
            DB::commit();

            return $this->success();
        }
        catch (\Exception $e) {
            DB::rollBack();
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }

    public function file_upload(Request $request)
    {
        try {
            if(!$request->name)
                return $this->error(error: 'name required');

            if(!$request->hasfile('file'))
                return $this->error('file required');


            $file = $request->file('file');
            $file_name = date('Y-m-d_H-i-s')."_".rand(1, 10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/file_uploaded/certificate/', $file_name);


            CertificateFile::create([
                'certificate_id'  => $request->certificate_id,
                'file'      => $file_name,
                'name'      => $request->name,
            ]);

            return $this->success();
        }
        catch(\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }

    public function file_delete($id)
    {
        try {

            $cf = CertificateFile::findOrFail($id);

            $file = public_path().'/file_uploaded/certificate/'.$cf->file;

            if(file_exists($file))
                unlink($file);

            $cf->delete();

            return $this->success(data: (object)['id' => $id]);
        }
        catch (\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }



    public function file_name_update(Request $request, int $id)
    {
        try {

            $file = CertificateFile::findOrFail($id);
            $file->fill([
                'name' => $request->name,
            ]);
            $file->save();

            return $this->success();
        }
        catch (\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }

    }

}
