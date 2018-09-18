<?php
namespace App\Http\Controllers\Api\Response;

use App\Http\Controllers\Api\Response\BaseAPI;

class WithdrawalAPI extends \Controller {

	public function withoutPaymentID($api = null, $coin = null, $amount = null, $address = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
			echo json_encode(['saque sem o payment id']);

		} else
			echo $user;
			
	}


	public function withPaymentID($api = null, $coin = null, $amount = null, $address = null, $paymentID = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
			echo json_encode(['saque com o payment id']);

		} else
			echo $user;

	}


}