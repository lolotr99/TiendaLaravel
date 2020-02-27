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


Route::get('/','CatalogoController@getIndex');
Route::get('/catalogo','CatalogoController@getIndex');

Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function() {
    Route::get('/cesta', function() { return view('privado.cesta');});
    Route::post('/catalogo/anadirCesta', 'CatalogoController@anadirCesta');
    Route::get('/catalogo/vaciarCesta','CatalogoController@vaciarCesta');
    Route::get('/control','AdminController@getIndex');
    Route::post('/control/anadirArticulo','AdminController@postArticulo');
    Route::get('/deleteArticulo/{id}','AdminController@deleteArticulo');
    Route::get('/updateArticulo/{id}','AdminController@updateArticulo');
    Route::post('/updateArticulo','AdminController@postUpdate');
    Route::get('/miPerfil','AdminController@miPerfil');
});

Route::post('/cesta/comprar','CatalogoController@comprarArticulo')->middleware('auth','mayoredad:18');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
