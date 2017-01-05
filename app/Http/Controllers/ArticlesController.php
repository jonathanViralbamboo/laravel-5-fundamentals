<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Http\Request;

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

      // dd($article->published_at->addDays(8)->diffForHumans());

      return view('articles.show', compact('article'));
    }

    // Create a new article
    public function create()
    {
      return view('articles.create');
    }

    // The code in the function will not fire unless validation is good
    public function store(ArticleRequest $request)
    {
      Article::create($request->all());

      return redirect('articles');
    }

    // Edit an existing article
    public function edit($id)
    {
      $article = Article::findOrFail($id);
      return view('articles.edit', compact('article'));
    }

    // Update an existing article
    public function update($id, ArticleRequest $request)
    {
      $article = Article::findOrFail($id);
      $article->update($request->all());

      return redirect('articles');
    }
}
