<?php
function InvalidAPI() {
	return ['status' => 'error', 'message' => 'invalid api key'];
}

function CoinPending() {
	return ['status' => 'error', 'message' => 'you need to enter a currency, for example: default(\'your api key here\', \'btc\')'];
}


function InvalidCoin() {
	return ['status' => 'error', 'message' => 'the currency code entered is invalid or not supported'];
}


function WaitingApiKey() {
	return ['status' => 'error', 'message' => 'you need to inform an api key, if you do not have it, you can generate one by entering your account in the settings tab'];
}

function InvalidAmount() {
	return ['status' => 'error', 'message' => 'the amount must be greater than 0 (zero)'];
}

function InvalidAddress() {
	return ['status' => 'error', 'message' => 'the address or email address must be invalid and must be between 10 and 95 characters'];
}

function AddressNotFound() {
	return ['status' => 'error', 'message' => 'we could not find an available address, please try again later'];
}