<?php

$portfolio = [
    ['title' => 'Proyecto #1'],
    ['title' => 'Proyecto #2'],
    ['title' => 'Proyecto #3'],
    ['title' => 'Proyecto #4'],
];

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/portfolio', 'portfolio', compact('portfolio'))->name('portfolio');
Route::view('/contact', 'contact')->name('contact');

// aprendible.com = Route::get('/', function)
//aprendible.com/contacto = Route::get('contacto', function)

/*Route::get('/', function(){
    $nombre = "Noah";
    return view('home', compact('nombre')); //['nombre' => $nombre]
})->name('home');*/

//Route::view('/', 'home')->name('/home'); //Políticas de privacidad, términos y condiciones

