<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        // References 'auth' in Kernel.php
        // If a logged out user tries to access the create and edit pages, redirect to the login page
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }

    // Display all articles
    public function index()
    {
        // // Get the authenticated user full details
        // return \Auth::user();
        // // Get the authendicated user name
        // return \Auth::user()->name;

        // Only display dates that have their published_at date in the past.
        // See published() in articles model as scopePublished.
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index')->with('articles', $articles);
    }

    // Display a single article
    public function show(Article $article)
    {
      // dd($article->published_at->addDays(8)->diffForHumans());
      // dd($article->published_at);

      return view('articles.show', compact('article'));
    }

    // Create a new article
    public function create()
    {
      $tags = Tag::pluck('name', 'id');

      return view('articles.create', compact('tags'));
    }

    // The code in the function will not fire unless validation is good
    public function store(ArticleRequest $request)
    {
      // Store a new article using the createArticle() method at bottom of page.
      $this->createArticle($request);

      // flash()->success('Your article has been created!');
      flash()->overlay('Your article has been created!', 'Good job!');

      return redirect('articles');
    }

    // Edit an existing article
    public function edit(Article $article)
    {
      $tags = Tag::pluck('name', 'id'); // temporary

      return view('articles.edit', compact('article', 'tags'));
    }

    // Update an existing article
    public function update(Article $article, ArticleRequest $request)
    {
      $article->update($request->all());

      // Syncs the selected tags for updating from the syncTags() method below
      $this->syncTags($article, $request->input('tag_list'));

      return redirect('articles');
    }

    // Sync up the list of tags in the database
    private function syncTags(Article $article, array $tags)
    {
      $article->tags()->sync($tags);
    }

    // save a new article
    private function createArticle(ArticleRequest $request)
    {
      // Create a new article. Then get the auth users articles and save a new one.
      $article = Auth::user()->articles()->create($request->all());

      // Syncs the selected tags for updating from the syncTags() method below
      $this->syncTags($article, $request->input('tag_list'));

      return $article;
    }
}
