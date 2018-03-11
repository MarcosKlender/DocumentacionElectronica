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

Route::get('/', 'HomeController@index')
	->name('ruta.login.index');

//-------------------------------------------------------------------------
Route::get('/home/factura', 'DocumentsController@factura')
	->name('ruta.documentos.factura');

Route::get('/home/retencion', 'DocumentsController@retencion')
	->name('ruta.documentos.retencion');

Route::get('/home/remision', 'DocumentsController@remision')
	->name('ruta.documentos.remision');

//-------------------------------------------------------------------------
Route::get('/home/search', 'SearchController@index')
	->name('ruta.busqueda');

Route::get('/home/search/ruc', 'SearchController@ruc')
	->name('ruta.busqueda.ruc');
	Route::post('/home/search/ruc', 'SearchController@ruc');

Route::get('/home/search/numero', 'SearchController@numero')
	->name('ruta.busqueda.numero');
	Route::post('/home/search/numero', 'SearchController@numero');	

Route::get('/home/search/fecha', 'SearchController@fecha')
	->name('ruta.busqueda.fecha');
	Route::post('/home/search/fecha', 'SearchController@fecha');

//-------------------------------------------------------------------------
Route::get('/usuario', 'UserController@index')
	->name('ruta.usuario');
Auth::routes();

Route::get('/home/descargar', 'DocumentsController@pdf')
	->name('ruta.documentos.pdf');