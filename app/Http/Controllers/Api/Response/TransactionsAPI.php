<?php
namespace App\Http\Controllers\Api\Response;


use ApiKey;


class TransactionsAPI extends \Controller {
	public function default($api = null, $coin = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
				$res = $user->MyAddress( strtolower($coin) );

				return json_encode([
					'status' => 'success',
					'coin' => $coin,
					'address' => $res->address,
					'created' => $res->created
				]);
		} else
			return $user;

	}


	public function depositsAll($api = null) {

	}

	public function deposits($api = null, $coin_wallet = null) {

	}

	public function tx($api = null, $tx_id) {
		
	}

	public function withdrawalsAll($api = null) {

	}

	public function withdrawals($api = null, $coin_wallet = null) {

	}



}