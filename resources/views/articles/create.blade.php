@extends('master')

@section('content')
  <h1 class="header--article">Write a New Article</h1>

  <hr />

  {!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}
    @include('articles._form', ['submitButtonText' => 'Add Article'])
  {!! Form::close() !!}

  @include('errors.list')
@endsection
