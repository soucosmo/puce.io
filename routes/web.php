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


$this->get('key', function() {
	\Auth::User()->api()->firstOrCreate(['key' => 'eyJpdiI6InVVUXV0alwvU2dpcVhXcFwvdkFnSVAwdz09IiwidmFsdWUiOiJUaGVwME0rdG40QlZxOUgydnd6VEVJd0x0UUp3ZHJwTUlTTlJjMjNaYkhNWnl0UU1PNGRLOTdHUHNwS0I5T2dcLyIsIm1hYyI6IjU5YzI0N2YwZTYyNjQ2NjliYTY4Nzg2ZDVlMTJhNzVkNjU3OTA2OTM1ODljMTQ4NjUxYmIxOTc2Yzg5YzgzZWQifQ==']);

})->middleware('auth');