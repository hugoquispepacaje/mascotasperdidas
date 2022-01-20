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

Route::get('/', 'AnuncioController@index');
Route::get('/anuncios/{tipo_publicacion}/{tipo_mascota}', 'AnuncioController@mostrar');
Route::get('/anuncios', 'AnuncioController@index');
Route::post('/anuncios', 'AnuncioController@store');
Route::put('/anuncios/{id}', 'AnuncioController@update');
Route::delete('/anuncios/{id}', 'AnuncioController@destroy');
Route::post('/anuncios/gestionar', 'AnuncioController@show');
Route::get('/anuncios/gestionar', 'AnuncioController@index');
