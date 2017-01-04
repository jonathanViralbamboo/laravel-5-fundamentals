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

// When opening /contact, load the contact.blade.php file in the 'pages' folder.
Route::get('about', function () {

  $data = [
    'first' => 'Jonathan',
    'last' => 'Dempsey'
  ];

  return view('pages.about', $data);
});
