<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopcartController;

// Rutas de inicio
Route::get('/', [HomeController::class, 'inicio']);
Route::get('home', HomeController::class)->name('home');

// Rutas de Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(ProductController::class)->group(function(){
        Route::post('productos', 'store')->name('productos.store');
        Route::get('productos/{producto}', 'show')->name('productos.show');
        Route::get('productos/{producto}/edit', 'edit')->name('productos.edit');
        Route::put('productos/{producto}', 'update')->name('productos.update');
    });
    Route::get('shopcart', ShopcartController::class)->name('shopcart');
});

// Rutas de productos
Route::controller(ProductController::class)->group(function(){
    Route::get('productos', 'index')->name('productos.index');
});

// Incluir autenticación de Breeze
require __DIR__.'/auth.php';
