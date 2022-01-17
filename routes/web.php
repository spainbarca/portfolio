<?php

Route::view('/', 'home')->name('home');
Route::view('/about/{param?}', 'about')->name('about');
Route::get('/portfolio', 'PortfolioController@index')->name('portfolio');
Route::view('/contact', 'contact')->name('contact');

Route::post('contact', 'MessagesController@store');
