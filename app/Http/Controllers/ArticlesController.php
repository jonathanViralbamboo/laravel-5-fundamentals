<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // Display all articles
    public function index()
    {
        $articles = Article::all();

        return view('articles.index')->with('articles', $articles);
    }

    // Display a single article
    public function show($id)
    {
      $article = Article::findOrFail($id);

      return view('articles.show', compact('article'));
    }
}
