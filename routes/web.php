<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\GanadoresController;

// Rutas de inicio
Route::get('/', [HomeController::class, 'inicio']);
Route::get('home', HomeController::class)->name('home');

// Rutas de Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas que necesitan sesión (protegidas)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::controller(ProductController::class)->group(function(){
        Route::post('productos', 'store')->name('productos.store');
        Route::delete('/productos/{producto}', 'destroy')->name('productos.destroy');
        Route::get('productos/{producto}/edit', 'edit')->name('productos.edit');
        Route::put('productos/{producto}', 'update')->name('productos.update');
    });

    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    // Vista con el pedido
    Route::get('/pedidos/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');

});

// Rutas de productos
Route::controller(ProductController::class)->group(function(){
    Route::get('productos/{producto}', 'show')->name('productos.show');
    Route::get('productos', 'index')->name('productos.index');
});

Route::get('/productos/zonas/{id}', [ProductController::class, 'zona'])->name('productos.zona');

Route::post('/zones/{zone}/score', [\App\Http\Controllers\ZoneScoreController::class, 'store'])
    ->middleware(['auth', 'role:Admin'])
    ->name('zones.score');

Route::get('/ganadores', [GanadoresController::class, 'index'])->name('ganadores.index');

// Incluir autenticación de Breeze
require __DIR__.'/auth.php';
