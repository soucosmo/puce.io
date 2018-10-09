<?php

$this->group(['middleware' => 'verified', 'prefix' => 'settings'], function() {
	$this->get('/', 'SettingsController@index')->name('settings');
	
	$this->group(['prefix' => 'change'], function() {
		$this->post('generate/key', 'SettingsController@GenerateKey');
		$this->post('password', 'SettingsController@password')->name('settings.change.password');
		$this->post('pin', 'SettingsController@pin')->name('settings.change.pin');
		$this->post('email', 'SettingsController@email')->name('settings.change.email');

	});

});