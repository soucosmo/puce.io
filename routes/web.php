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


$this->get('/', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);


$this->get('test', 'Test@index');
$this->get('puce', 'Puce@index');

include_once 'custom/dashboard.php';

include_once 'custom/documentation.php';

include_once 'custom/guest.php';

include_once 'custom/settings.php';

include_once 'custom/webservice.php';

$this->get('logout', function() {
	Auth::logout();
	return Redirect()->Route('home');
})->name('logout');