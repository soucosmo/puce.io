<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use App\Http\Controllers\Api\Response\BaseAPI;


class WithdrawalAPI extends \Controller {

	public function withoutPaymentID($api = null, $coin = null, $amount = null, $address = null, $url = null) {
		$user = BaseAPI::checkWithdrawal($api, $coin, $amount, $address);

		$data = (object) ['amount' => $amount, 'address' => strtolower($address), 'payment_id' => null, 'url' => $url];

		if (!empty($user) and empty($user['status'])) {

				if ( filter_var($address, FILTER_VALIDATE_EMAIL) ) {
						
					return json_encode($user->balance()->firstOrCreate(['coin' => Code($coin)])->transferMail($data));
					
					
				}

				return json_encode($user->balance()->firstOrCreate(['coin' => Code($coin)])->withdrawal($data));

		} else
			return json_encode($user);
			
	}


	public function withPaymentID($api = null, $coin = null, $amount = null, $address = null, $paymentID = null, $url = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		$data = (object) ['amount' => $amount, 'address' => strtolower($address), 'payment_id' => $paymentID, 'url' => $url];

		if (!empty($user) and empty($user['status'])) {
			return 	json_encode($user->balance()->firstOrCreate(['coin' => Code($coin)])->withdrawal($data));

		} else
			return json_encode($user);

	}


}