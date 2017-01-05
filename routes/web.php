<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('contact', function () {
  return view('pages.contact');
});

Route::get('about', function () {

  $data = [
    'first' => 'Jonathan',
    'last' => 'Dempsey'
  ];

  $games = [
    'Bioshock',
    'Final Fantasy',
    'Mass Effect'
  ];

  return view('pages.about', $data, compact('games'));
});

Route::resource('articles', 'ArticlesController');
