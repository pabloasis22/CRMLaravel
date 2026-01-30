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

// Rutas de proveedores
Route::get('/proveedores', [App\Http\Controllers\ProveedoresController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/create', [App\Http\Controllers\ProveedoresController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [App\Http\Controllers\ProveedoresController::class, 'store'])->name('proveedores.store');
Route::get('/proveedores/{proveedor}', [App\Http\Controllers\ProveedoresController::class, 'show'])->name('proveedores.show');
Route::get('/proveedores/{proveedor}/edit', [App\Http\Controllers\ProveedoresController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{proveedor}', [App\Http\Controllers\ProveedoresController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/{proveedor}', [App\Http\Controllers\ProveedoresController::class, 'destroy'])->name('proveedores.destroy');

// Rutas de puestos de trabajo
Route::get('/puestos', [App\Http\Controllers\PuestosController::class, 'index'])->name('puestos.index');
Route::get('/puestos/create', [App\Http\Controllers\PuestosController::class, 'create'])->name('puestos.create');
Route::post('/puestos', [App\Http\Controllers\PuestosController::class, 'store'])->name('puestos.store');
Route::get('/puestos/{puesto}', [App\Http\Controllers\PuestosController::class, 'show'])->name('puestos.show');
Route::get('/puestos/{puesto}/edit', [App\Http\Controllers\PuestosController::class, 'edit'])->name('puestos.edit');
Route::put('/puestos/{puesto}', [App\Http\Controllers\PuestosController::class, 'update'])->name('puestos.update');
Route::delete('/puestos/{puesto}', [App\Http\Controllers\PuestosController::class, 'destroy'])->name('puestos.destroy');