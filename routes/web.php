<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopcartController;

Route::get('home', HomeController::class);
Route::get('shopcart', ShopcartController::class);

Route::controller(ProductController::class)->group(function(){
    Route::get('productos', 'index')->name('productos.index');
    Route::get('productos/create', 'create')->name('productos.create');
    Route::get('productos/{id}', 'show')->name('productos.show');
});

