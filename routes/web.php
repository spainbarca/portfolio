<?php

/*DB::listen(function($query) {
	var_dump($query->sql);
});*/

App::setlocale("es");

Route::view('/', 'home')->name('home');
Route::view('/about/{param?}', 'about')->name('about');

Route::resource('portfolio', 'ProjectController')
	->parameters(['portfolio' => 'project'])
	->names('projects');

Route::get('categorias/{category}', 'CategoryController@show')->name('categories.show');

Route::view('/contact', 'contact')->name('contact');

Route::post('contact', 'MessageController@store')->name('messages.store');

Auth::routes(['register' => false]);
