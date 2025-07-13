<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('categorias', 'App\Http\Controllers\CategoriaController');

Route::resource('produtos', 'App\Http\Controllers\ProdutoController');