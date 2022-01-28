<?php

App::setlocale("es");

Route::view('/', 'home')->name('home');
Route::view('/about/{param?}', 'about')->name('about');

Route::get('/portfolio', 'ProjectController@index')->name('projects.index');
Route::get('/portfolio/crear', 'ProjectController@create')->name('projects.create');
Route::get('/portfolio/{project}/editar', 'ProjectController@edit')->name('projects.edit');
Route::patch('/portfolio/{project}', 'ProjectController@update')->name('projects.update');
Route::post('/portfolio', 'ProjectController@store')->name('projects.store');
Route::get('/portfolio/{project}', 'ProjectController@show')->name('projects.show');
Route::delete('/portfolio/{project}', 'ProjectController@destroy')->name('projects.destroy');

Route::view('/contact', 'contact')->name('contact');

Route::post('contact', 'MessageController@store')->name('messages.store');
