<?php

App::setlocale("es");

Route::view('/', 'home')->name('home');
Route::view('/about/{param?}', 'about')->name('about');
Route::get('/portfolio', 'ProjectController@index')->name('projects.index');
Route::get('/portfolio/{id}', 'ProjectController@show')->name('projects.show');
Route::view('/contact', 'contact')->name('contact');

Route::post('contact', 'MessageController@store')->name('messages.store');
