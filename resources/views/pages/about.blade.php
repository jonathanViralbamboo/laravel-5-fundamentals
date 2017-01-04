@extends('master')
@section('content')

  @if ($first == 'Jonathan')
    <h1>About Me: {{ $first }} {{ $last }}</h1>
  @else
    <h1>Else</h1>
  @endif

  @if(count($games))
    <h3>Games I Like:</h3>
    <ul>
      @foreach ($games as $game)
        <li>{{ $game }}</li>
      @endforeach
    </ul>
  @endif

  <p>About me paragraph!</p>
@stop
