<?php
namespace App\Http\Controllers;

use User;

use App\Http\Controllers\Api\Response\AddressAPI;
use App\Http\Controllers\Api\Response\BalanceAPI;
use Crypt;
use Hash;
use App\Http\Controllers\Puce;


class Test extends \Controller {

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
		$Puce = new Puce('D12EDDDD7DF0192EEC538DD8140C38468A6F8D52');

		

		dd(
			$Puce->balancesTest('btc')
		);
		
	}

	

}