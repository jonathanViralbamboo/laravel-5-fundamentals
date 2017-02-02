@extends('master')

@section('content')
  <article class="header--article">
    <h2><a href="#">{{ $article->title }}</a></h2>
    <div class="body">
      {{ $article->body }}
    </div>
  </article>

  <h5>Tags:</h5>
  <ul>
    @foreach ($article->tags as $tag)
      <li>{{ $tag->name }}</li>
    @endforeach
  </ul>
@endsection
