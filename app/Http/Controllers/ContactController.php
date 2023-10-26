<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Traits\LocaleTrait;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use LocaleTrait;

    public function index()
    {
        $locale = $this->locale();

        $contact = Contact::with(['language' => function($query) use($locale) {
            $query->where('locale', '=', $locale);
        }])->first();

        return view('pages.contact', compact('contact'));
    }

}
