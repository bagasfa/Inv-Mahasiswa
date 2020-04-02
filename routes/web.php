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

	// Admin Panel

	// Fakultas
	Route::get('/fakultas', 'FakultasController@index');
	Route::post('/addFakultas', 'FakultasController@add');
	Route::get('/fakultas/{id}/delete','FakultasController@delete');
	Route::post('/fakultas/{id}/edit', 'FakultasController@edit');

	// Staff Panel