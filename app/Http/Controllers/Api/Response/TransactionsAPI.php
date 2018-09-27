<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use Api;
use Response;


class TransactionsAPI extends \Controller {

	public function depositsAll($api = '', $pin_key = '', $coin = '') {
		$user = BaseAPI::checkTransaction($api, $pin_key, $coin);

		if (!empty($user->id)) {
				
		} else
			return $user;
	}


	public function deposits($api = '', $coin_wallet = '', $limit = 10) {
		if ($limit > 50)
			$limit = 50;
		$user = BaseAPI::checkTransaction($api, $pin_key, $coin);

		if (!empty($user->id)) {
			$array['status'] = 'success';
			$array['data'] = $user->deposit()->select('address', 'payment_id', 'tx_id', 'amount', 'fee', 'status', 'created_at as created')
							->where('coin', Code($coin_wallet))->OrWhere('address', $coin_wallet)->OrderByDesc('id')->Limit($limit)->get();

			return Reponse::Json($array);

		} else
			return Reponse::Json($user);
	}


	public function tx($api = '', $pin_key = '', $tx_id = '') {

	}


	public function withdrawalsAll($api = '', $pin_key = '') {

	}


	public function withdrawals($api = '', $pin_key = '', $coin_wallet = '', $limit = 20) {

	}



}