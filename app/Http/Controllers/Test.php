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

		//User::Find(1)->login()->create([]);
		dd(
			Altcoin(1)
		);
		
	}

	

}