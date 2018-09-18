<?php
namespace App\Http\Controllers\Api\Response;

use App\Http\Controllers\Api\Response\BaseAPI;

class WithdrawalAPI extends \Controller {

	public function withoutPaymentID($api = null, $coin = null, $amount = null, $address = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
			if ($address and strlen($address) >= 10 and strlen($address) <= 250) {
				return json_encode(['status' => 'sucesso']);
			} else
				return json_encode(['status' => 'error', 'message' => 'the address must be valid and be between 10 and 250 characters']);
		} else
			return $user;
			
	}


	public function withPaymentID($api = null, $coin = null, $amount = null, $address = null, $paymentID = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
			return json_encode(['saque com o payment id']);

		} else
			return $user;

	}


}