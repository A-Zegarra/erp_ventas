<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoProductoController;
use App\Http\Controllers\UnidadSunatController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');})->name('home');
Route::get('/dashboard', function () {    return view('dashboard');})->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('unidades-sunat', UnidadSunatController::class)->parameters(['unidades-sunat' => 'unidadSunat']);
    Route::resource('tipos-producto', TipoProductoController::class)->parameters(['tipos-producto' => 'tipoProducto']);
    Route::resource('productos', ProductoController::class)->parameters(['productos' => 'producto']);
    Route::resource('compras', CompraController::class);
    Route::resource('vehiculos', VehiculoController::class)->only(['index']);
    Route::resource('conductores', ConductorController::class)->only(['index']);
});
if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}
