<?php

$this->get('reset/auth', function() {
	return abort(404);
})->name('reset.google');

$this->get('affiliates', function() {
	return abort(404);
})->name('affiliate.program');

$this->get('prices-and-rates', function() {
	return abort(404);
})->name('prices_and_rates');

$this->view('privacy', 'privacy')->name('privacy');
$this->view('terms-of-use', 'terms')->name('terms');