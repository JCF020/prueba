<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
  // return view('\App\Http\Controllers\CategoriasController@index');
//});



Route::get('/', '\App\Http\Controllers\ArticulosController@paginaprincipal');
Route::get('/contenidoArticulo/{id}', '\App\Http\Controllers\ArticulosController@contenidoArticulo');
Route::resource('categorias', '\App\Http\Controllers\CategoriasController');
Route::resource('articulos', '\App\Http\Controllers\ArticulosController');
Route::get('/api','\App\Http\Controllers\ApiController@index');
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
