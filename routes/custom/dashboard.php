<?php

$this->group(['middleware' => 'verified'], function() {
	$this->get('dashboard/{coin?}', 'DashboardController@index')->name('dashboard');
});