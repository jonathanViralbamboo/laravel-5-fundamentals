@extends('master')

@section('content')
  <article>
    <h2><a href="#">{{ $article->title }}</a></h2>
    <div class="body">
      {{ $article->body }}
    </div>
  </article>
@endsection
