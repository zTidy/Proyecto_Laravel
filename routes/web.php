<?php

use Illuminate\Support\Facades\Route;

//Ruta predeterminada que nos manda a la vista Welcome (index)
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Ruta home que nos dirige a la página principal donde se crean nuestros clientes y sus recetas
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta que nos dirige al CRUD de clientes (vista Clientes)
Route::resource('clientes', App\Http\Controllers\ClienteController::class);

//Ruta que nos dirige al CRUD de receta (vista Receta)
Route::resource('receta', App\Http\Controllers\RecetumController::class);

//Ruta que nos dirige al CRUD de los usuarios
Route::resource('users', App\Http\Controllers\UserController::class);
