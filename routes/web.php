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

// Route::get('/', function () {
//     return view('9');
// });

Route::get('/prueba', function () {
    return view('prueba');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/NumFiLB', 'BaseDeDatosController@filistaB')->name('NumFiLB');

Route::get('/NumMovLB', 'BaseDeDatosController@TablamovLB')->name('NumMovLB');

Route::get('/NumFiLN', 'HomeController@create')->name('NumFiLN');

Route::get('/NumMovLN', 'HomeController@delete')->name('NumMovLN');

Route::get('/cargarlista', 'BaseDeDatosController@showform')->name('LisNaListB');

Route::post('/encabezado', 'BaseDeDatosController@store')->name('encabezado');

Route::post('/NumMovLB','BaseDeDatosController@prueba')->name('Detallado');

Route::get('/historico','BaseDeDatosController@graficas')->name('historico');

Route::post('/cargarlista','BaseDeDatosController@destroymoviles')->name('eliminar');

// Route::resource('cargarlista','BaseDeDatosController')->only(['destroy']);