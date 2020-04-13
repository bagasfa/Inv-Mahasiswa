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
	// Landing Page
	Route::get('/', 'PagesController@landingPage');

	// Authenticate
	Route::get('/login', 'AuthController@index')->name('login');
	Route::post('/postLogin','AuthController@postLogin');
	Route::post('/register','AuthController@register');
	Route::get('/logout','AuthController@logout');

	// Admin Panel
Route::group(['middleware' => ['auth','checkRole:admin']], function(){
	// Fakultas
	Route::get('/fakultas', 'FakultasController@index');
	Route::post('/fakultas/add', 'FakultasController@add');
	Route::get('/fakultas/{id}/delete','FakultasController@delete');
	Route::get('/fakultas/{id}/edit', 'FakultasController@edit');
	Route::post('/fakultas/{id}/update', 'FakultasController@update');

	// Jurusan
	Route::get('/jurusan', 'JurusanController@index');
	Route::post('/jurusan/add', 'JurusanController@add');
	Route::get('/jurusan/{id}/delete','JurusanController@delete');
	Route::get('/jurusan/{id}/edit', 'JurusanController@edit');
	Route::post('/jurusan/{id}/update', 'JurusanController@update');
	Route::get('/jurusan/search', 'JurusanController@search');

	// Ruangan
	Route::get('/ruangan', 'RuanganController@index');
	Route::post('/ruangan/add', 'RuanganController@add');
	Route::get('/ruangan/{id}/delete','RuanganController@delete');
	Route::get('/ruangan/{id}/edit', 'RuanganController@edit');
	Route::post('/ruangan/{id}/update', 'RuanganController@update');

});

	// Staff Panel
Route::group(['middleware' => ['auth','checkRole:admin,staff']], function(){
	// Dashboard
	Route::get('/dashboard','pagesController@dashboard');

	// Barang
	Route::get('/barang', 'BarangController@index');
	Route::post('/barang/add', 'BarangController@add');
	Route::get('/barang/{id}/delete','BarangController@delete');
	Route::get('/barang/{id}/edit', 'BarangController@edit');
	Route::post('/barang/{id}/update', 'BarangController@update');
	Route::get('/barang/exportXLSX','BarangController@exportXLSX');
});