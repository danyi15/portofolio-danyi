<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Biodata;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;

class ArticleController extends Controller
{
       public function index()
{
    $articles = Article::latest()->paginate(6);
    $biodata = Biodata::first();

    return view('frontend.articles.index', compact('articles', 'biodata'));
}

public function show($slug)
{
    $article = Article::where('slug', $slug)->firstOrFail();
    $biodata = Biodata::first();

    return view('frontend.articles.show', compact('article', 'biodata'));
}
}
