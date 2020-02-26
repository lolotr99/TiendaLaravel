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

Route::get('/','CatalogoController@getIndex')->middleware('auth');
Route::get('/catalogo','CatalogoController@getIndex')->middleware('auth');
Route::post('/catalogo','CatalogoController@postArticulo')->middleware('auth');
Route::post('/catalogo/anadirCesta', 'CatalogoController@anadirCesta')->middleware('auth');
Route::get('/control','AdminController@getIndex')->middleware('auth');
Route::get('/deleteArticulo/{id}','AdminController@deleteArticulo')->middleware('auth');
Route::get('/updateArticulo/{id}','AdminController@updateArticulo')->middleware('auth');
Route::post('/updateArticulo','AdminController@postUpdate');

Route::get('/cesta', function() {
    return view('privado.cesta');
})->middleware('auth','mayoredad:18');

Route::get('/miPerfil', function() {
    return view('privado.miPerfil');
})->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
