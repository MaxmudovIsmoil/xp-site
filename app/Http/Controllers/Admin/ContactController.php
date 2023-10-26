<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ContactTranslation;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $contact = Contact::first();


        return view('admin.contact.index', compact('contact'));
    }

    public function one(Request $request)
    {
        try {
            $contact = Contact::where(['id' => $request->id])
                ->with('language')
                ->first();

            return $this->success(data: $contact);
        }
        catch (\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }


    public function update(ContactRequest $request, $id)
    {
        $request->validated($request->all());

        try {
            DB::beginTransaction();
            Contact::where(['id' => $id])
                ->update([
                    'phone' => $request->phone,
                    'email' => $request->email,
                ]);

            ContactTranslation::where(['contact_id' => $id])->delete();

            $datas = [
                0 => [
                    'contact_id' => $id,
                    'locale' => 'en',
                    'address' => $request->address_en,
                    'key' => ''
                ],
                1 => [
                    'contact_id' => $id,
                    'locale' => 'ru',
                    'address' => $request->address_ru,
                    'key' => ''
                ],
                2 => [
                    'contact_id' => $id,
                    'locale' => 'uz',
                    'address' => $request->address_uz,
                    'key' => ''
                ]
            ];
            ContactTranslation::insert($datas);
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
            if(!$request->hasfile('image'))
                return $this->error('required');

            $image = $request->file('image');

            $image_name = date('Y-m-d_H-i-s')."_".rand(1, 10).'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/file_uploaded/contact/', $image_name);


            $old_image = public_path().'/file_uploaded/contact/'.$request->old_image;
            if(file_exists($old_image))
                unlink($old_image);


            Contact::where(['id' => $request->id])
                ->update(['image' => $image_name]);

            return $this->success();
        }
        catch(\Exception $e) {
            return $this->error(error: $e->getMessage(), code: $e->getCode());
        }
    }
}
