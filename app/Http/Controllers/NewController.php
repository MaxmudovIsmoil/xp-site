<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewTranslation;
use App\Traits\LocaleTrait;
use Illuminate\Http\Request;

class NewController extends Controller
{
    use LocaleTrait;

    public function index()
    {
        $locale = $this->locale();
        $news = NewTranslation::select('new_id', 'locale', 'name', 'description')
            ->where('locale', $locale)
            ->with('files')
            ->orderBy('new_id', 'DESC')
            ->paginate(10);

        return view('pages.news', compact('news'));
    }


    public function one(string $locale, int $new_id)
    {
        $new = NewTranslation::select('new_id', 'locale', 'name', 'description')
            ->where('new_id', $new_id)
            ->where('locale', $locale)
            ->with('files')
            ->first();

        $last_news = News::with(['language' => function ($query) use($locale) {
                $query->where('locale', $locale);
            }])
            ->orderby('id', 'DESC')
            ->get();

        return view('pages.new-one', compact('new', 'last_news'));
    }

}
