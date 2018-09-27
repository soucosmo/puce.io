<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use App\Http\Controllers\Api\Response\BaseAPI;
use Response;


class WithdrawalAPI extends \Controller {

	public function withoutPaymentID($api = '', $pin_key = '', $coin = '', $amount = '', $address = '', $url = '') {
		$user = BaseAPI::checkWithdrawal($api, $pin_key, $coin, $amount, $address);

		$data = (object) ['amount' => $amount, 'address' => strtolower($address), 'payment_id' => null, 'url' => $url];

		if (!empty($user) and empty($user['status'])) {

				if ( filter_var($address, FILTER_VALIDATE_EMAIL) )						
					return Response::Json($user->balance()->firstOrCreate(['coin' => Code($coin)])->transferMail($data));


				return Response::Json($user->balance()->firstOrCreate(['coin' => Code($coin)])->withdrawal($data));

		} else
			return Response::Json($user);
			
	}


	public function withPaymentID($api = '', $pin_key = '', $coin = '', $amount = '', $address = '', $paymentID = '', $url = '') {
		$user = BaseAPI::checkTransaction($api, $pin_key, $coin);

		$data = (object) ['amount' => $amount, 'address' => strtolower($address), 'payment_id' => $paymentID, 'url' => $url];

		if (!empty($user) and empty($user['status'])) {

			if ( filter_var($address, FILTER_VALIDATE_EMAIL) )
				return Response::Json($user->balance()->firstOrCreate(['coin' => Code($coin)])->transferMail($data));


			return 	Response::Json($user->balance()->firstOrCreate(['coin' => Code($coin)])->withdrawal($data));

		} else
			return Response::Json($user);

	}


}