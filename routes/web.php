<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UnidadSunatController;
use App\Http\Controllers\TipoProductoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ConductorController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('unidades-sunat', UnidadSunatController::class);
    Route::resource('tipos-producto', TipoProductoController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('vehiculos', VehiculoController::class);
    Route::resource('conductores', ConductorController::class);
});

if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}
