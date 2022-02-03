<?php

App::setlocale("es");

Route::view('/', 'home')->name('home');
Route::view('/about/{param?}', 'about')->name('about');

Route::resource('portfolio', 'ProjectController')
	->parameters(['portfolio' => 'project'])
	->names('projects');

Route::view('/contact', 'contact')->name('contact');

Route::post('contact', 'MessageController@store')->name('messages.store');

Auth::routes(['register' => false]);
