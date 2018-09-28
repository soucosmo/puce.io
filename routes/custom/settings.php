<?php

$this->group(['middleware' => ['auth']], function() {
	$this->post('generate/key', 'SettingsController@GenerateKey');


	$this->group(['prefix' => 'change'], function() {
		$this->post('password', 'SettingsController@password');
		$this->post('pin', 'SettingsController@pin');
		$this->post('profile', 'SettingsController@profile');

	});

});