<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Request;

class ArticlesController extends Controller
{
    // Display all articles
    public function index()
    {
        $articles = Article::latest('published_at')->get();

        return view('articles.index')->with('articles', $articles);
    }

    // Display a single article
    public function show($id)
    {
      $article = Article::findOrFail($id);

      return view('articles.show', compact('article'));
    }

    // Create a new article
    public function create()
    {
      return view('articles.create');
    }

    public function store()
    {
      $input = Request::all();
      $input['published_at'] = Carbon::now();

      // $article = new Article;
      // $article->title = $input['title'];
      // $article->body = $input['body'];

      // OR

      Article::create($input);

      return redirect('articles');
    }
}
