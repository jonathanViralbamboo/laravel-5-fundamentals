<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    // Display all articles
    public function index()
    {
        // Only display dates that have their published_at date in the past. See published() in articles model.
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index')->with('articles', $articles);
    }

    // Display a single article
    public function show($id)
    {
      $article = Article::findOrFail($id);

      dd($article->published_at->addDays(8)->diffForHumans());

      return view('articles.show', compact('article'));
    }

    // Create a new article
    public function create()
    {
      return view('articles.create');
    }

    // The code in the function will not fire unless validation is good
    public function store(CreateArticleRequest $request)
    {
      Article::create($request->all());

      return redirect('articles');
    }
}
