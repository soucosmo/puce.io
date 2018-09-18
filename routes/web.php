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
include_once 'webservice.php';

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['verify' => true]);

$this->get('verificado', function() {
	return 'Olá, sua conta foi verificada com sucesso!';
});

Route::get('/home', 'HomeController@index')->name('home');
