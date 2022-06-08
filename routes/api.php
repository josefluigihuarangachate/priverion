<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductosController;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::post('/login', [UsuariosController::class, 'login']);
Route::post('/registrar', [ProductosController::class, 'registrar']);
Route::post('/eliminar', [ProductosController::class, 'eliminar']);
Route::post('/mostrar', [ProductosController::class, 'mostrar']);
Route::post('/actualizar', [ProductosController::class, 'actualizar']);
