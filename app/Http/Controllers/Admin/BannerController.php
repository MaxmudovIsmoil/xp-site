<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;


class BannerController extends Controller
{

    use HttpResponses;


    public function index()
    {
        $banner = Banner::first();

        return view('admin.banner.index', compact('banner'));
    }


    public function update(Request $request)
    {
        try {
            if(!$request->file('file'))
                return $this->error(error: 'required');


            $file = $request->file('file');
            $file_name = date('Y-m-d_H-i-s')."_".rand(1, 10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/file_uploaded/banner/', $file_name);


            $banner = Banner::findOrFail(1);

            $file = public_path().'/file_uploaded/banner/'.$banner->file;
            if(file_exists($file))
                unlink($file);


            $banner->fill(['file' => $file_name]);
            $banner->save();

            return $this->success();

        }
        catch(\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }

    }


}
