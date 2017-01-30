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

// interface BarInterface {}
//
// class Bar implements BarInterface {}
// class SecondBar implements BarInterface {}
//
// // App::bind('BarInterface', 'Bar');
// App::bind('BarInterface', 'SecondBar');
//
// Route::get('bar', function(BarInterface $bar) {
//   $bar = App::make('BarInterface');
//   dd($bar);
// });

Route::get('foo', 'fooController@foo');

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

Auth::routes();
Route::get('/home', 'HomeController@index');

// Dummy route for middleware manager test
// Route::get('foo', ['middleware' => ['manager'], function() {
//   return 'This page may only be viewed by a manager!';
// }]);
