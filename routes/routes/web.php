<?php

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

Route::get('/', function () { return view('welcome');});
Route::name('exam43a')->get('exam43a/', 'SistemController@exam43a');
Route::name('salon')->post('salon/', 'SistemController@salon');
Route::name('carrito')->get('carrito/', 'SistemController@carrito');
Route::name('mostrar_carrito')->get('mostrar_carrito/', 'SistemController@mostrar_carrito');



