@extends('master')
@section('content')
  <h1 class="header--article">Edit: {!! $article->title !!}</h1>

  {!! Form::model($article, ['method' => 'PATCH', 'url' => 'articles/' . $article->id]) !!}
    @include('articles._form', ['submitButtonText' => 'Update Article'])
  {!! Form::close() !!}

  @include('errors.list')
@endsection
