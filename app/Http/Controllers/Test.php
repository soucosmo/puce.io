<?php
namespace App\Http\Controllers;

use User;

use App\Http\Controllers\Api\Response\AddressAPI;
use App\Http\Controllers\Api\Response\BalanceAPI;
use Crypt;
use Hash;



class Test extends \Controller {
	private $apikey, $url;
	public function __construct($apikey = '') {
		if (config('app.env') == 'local')
			$this->url = 'http://127.0.0.1:8000/api/'.$apikey;
		else
			$this->url = 'https://puce.io/api/'.$apikey;
		
	}

	public function index() {
/*

		$start= microtime(true);

	// Script que desejas medir o tempo
		echo '<pre>';
		print_r(Altcoins());

		$end= microtime(true);

		$time = abs($start - $end);

		echo '<br>'.number_format($time,25) . '<br>';
		echo memory_get_usage();*/
	//	echo Crypt::encryptString('D12EDDDD7DF0192EEC538DD8140C38468A6F8D52');
		echo Crypt::encryptString('D12EDDDD7DF0192EEC538DD8140C38468A6F8D52');

	}

	

	public function accountCreate(string $email, string $password, string $pin) {
		$this->url .= '/account/create/'.$email.'/'.$password.'/'.$pin;

		return $this->curl();
	}


	public function accountChange(string $email, string $password, string $pin) {
		$this->url .= '/account/change/'.$email.'/'.$password.'/'.$pin;

		return $this->curl();
	}
	

	public function address(string $coin) {
		$this->url .= '/address/'.$coin;

		return $this->curl();
	}


	public function addresses(string $coin) {
		$this->url .= '/addresses/'.$coin;

		return $this->curl();
	}


	public function balance(string $coin) {
		$this->url .= '/balance/'.$coin;

		return $this->curl();
	}

	public function balances() {
		$this->url .= '/balances';

		return $this->curl();
	}


	public function curl() {

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$return = curl_exec($ch);

		curl_close($ch);

		return $return;
	}


	public function myAddress(string $coin) {
		$this->url .= '/myaddress/'.$coin;

		return $this->curl();
	}


	public function withdrawal(string $coin, string $address, $pay_or_amount, float $amount = null) {

		if (floatval($pay_or_amount) > 0 and !is_string($pay_or_amount))

			$this->url .= '/withdrawal/'.$coin.'/'.$address.'/'.$pay_or_amount;

		elseif (is_string($pay_or_amount))

			$this->url .= '/withdrawal/'.$coin.'/'.$address.'/'.$pay_or_amount.'/'.$amount;

		return $this->curl();	

	}

}