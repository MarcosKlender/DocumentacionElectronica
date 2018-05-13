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

//|--------------------------------------------------------------------------
//| DOCUMENTOS
//|--------------------------------------------------------------------------

Route::get('/home/factura', 'DocumentsController@factura')
	->name('ruta.documentos.factura');

Route::get('/home/debito', 'DocumentsController@debito')
	->name('ruta.documentos.debito');

Route::get('/home/credito', 'DocumentsController@credito')
	->name('ruta.documentos.credito');

Route::get('/home/retencion', 'DocumentsController@retencion')
	->name('ruta.documentos.retencion');

Route::get('/home/remision', 'DocumentsController@remision')
	->name('ruta.documentos.remision');

//|--------------------------------------------------------------------------
//| BÚSQUEDA
//|--------------------------------------------------------------------------

Route::get('/home/search', 'SearchController@index')
	->name('ruta.busqueda');

Route::get('/home/search/ruc', 'SearchController@ruc')
	->name('ruta.busqueda.ruc');
	Route::post('/home/search/ruc', 'SearchController@ruc');

Route::get('/home/search/numero', 'SearchController@numero')
	->name('ruta.busqueda.numero');
	Route::post('/home/search/numero', 'SearchController@numero');	

Route::get('/home/search/valor', 'SearchController@valor')
	->name('ruta.busqueda.valor');
	Route::post('/home/search/valor', 'SearchController@valor');	

Route::get('/home/search/fecha', 'SearchController@fecha')
	->name('ruta.busqueda.fecha');
	Route::post('/home/search/fecha', 'SearchController@fecha');

//|--------------------------------------------------------------------------
//| USUARIOS
//|--------------------------------------------------------------------------

Route::get('home/usuario', 'UserController@index')
	->name('ruta.usuario');
	
Auth::routes();

Route::get('home/usuario/editar', 'UserController@update_one')
	->name('ruta.usuario.editar');

Route::put('home/usuario/editar', 'UserController@editar')
	->name('editar.usuario');

Route::get('home/usuario/cambiar', 'UserController@update_two')
	->name('ruta.usuario.cambiar');

Route::put('home/usuario/cambiar', 'UserController@cambiar')
	->name('cambiar.usuario');

//-------------------------------------------------------------------------

Route::get('/home/descargar/xml/{id}', 'DocumentsController@xml')
    ->name('ruta.documentos.xml');

Route::get('/home/descargar/pdf/{id}', 'DocumentsController@pdf')
	->name('ruta.documentos.pdf');