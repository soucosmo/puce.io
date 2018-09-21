<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use Api;


class TransactionsAPI extends \Controller {

	public function depositsAll($api = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user->id)) {
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


	public function deposits($api = null, $coin_wallet = null) {
		$
	}


	public function tx($api = null, $tx_id) {

	}


	public function withdrawalsAll($api = null) {

	}


	public function withdrawals($api = null, $coin_wallet = null) {

	}



}