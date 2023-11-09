<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Http\Requests\CarouselStoreRequest;
use App\Http\Requests\CarouselUpdateRequest;
use App\Models\Carousel;


class CarouselController extends Controller
{

    use HttpResponses;


    public function index()
    {
        $carousel = Carousel::orderBy('number')->orderBy('id')->get();

        return view('admin.carousel.index', compact('carousel'));
    }



    public function store(CarouselStoreRequest $request)
    {
        $file = $request->file('file');
        $file_name = date('Y-m-d_H-i-s')."_".rand(1, 10).'.'.$file->getClientOriginalExtension();
        $file->move(public_path().'/file_uploaded/carousel/', $file_name);

        Carousel::create([
            'number' => $request->number,
            'file'   => $file_name,
        ]);

        return $this->response();
    }


    public function update(CarouselUpdateRequest $request, int $id)
    {
        $c = Carousel::findOrFail($id);
        $c->fill(['number' => $request->number]);
        $c->save();

        return $this->response();
    }


    public function destroy(int $id)
    {
        $c = Carousel::findOrFail($id);

        $file = public_path() . '/file_uploaded/carousel/' . $c->file;
        if(file_exists($file))
            unlink($file);

        $c->delete();

        return $this->response(data: (object)['id' => $id]);
    }
}
