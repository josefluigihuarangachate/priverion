<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// PARA VISTAS

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos', [ProductosController::class, 'listado']);
Route::get('/cerrarsesion', [ProductosController::class, 'cerrarsesion']);

//Route::get('/registrar', function () {
//    return view('registrarproducto');
//});