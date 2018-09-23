<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use Api;


class TransactionsAPI extends \Controller {

	public function depositsAll($api = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user->id)) {
				
		} else
			return $user;
	}


	public function deposits($api = null, $coin_wallet = null, $limit = 10) {
		if ($limit > 50)
			$limit = 50;
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user->id)) {
			$array['status'] = 'success';
			$array['data'] = $user->deposit()->select('address', 'payment_id', 'tx_id', 'amount', 'fee', 'status', 'created_at as created')
							->where('coin', Code($coin_wallet))->OrWhere('address', $coin_wallet)->OrderByDesc('id')->Limit($limit)->get();

			return json_encode($array);

		} else
			return json_encode($user);
	}


	public function tx($api = null, $tx_id) {

	}


	public function withdrawalsAll($api = null) {

	}


	public function withdrawals($api = null, $coin_wallet = null, $limit = 20) {

	}



}