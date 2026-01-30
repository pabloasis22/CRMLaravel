<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas de clientes
Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [App\Http\Controllers\ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [App\Http\Controllers\ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'destroy'])->name('clientes.destroy');

// Rutas de productos
Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [App\Http\Controllers\ProductosController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [App\Http\Controllers\ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.destroy');