<?php

$this->get('documentation', 'DocumentationController@index')->name('documentation');

$this->group(['prefix' => 'download'], function() {
	
	$this->get('js', 'DocumentationController@js')->name('download.js');

	$this->get('php', 'DocumentationController@php')->name('download.php');

	$this->get('python', 'DocumentationController@python')->name('download.python');

});