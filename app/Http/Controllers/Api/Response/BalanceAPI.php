<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use Api;


class BalanceAPI extends \Controller {
	public function from($api = null, $coin = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
			$res = $user->MyBalance($coin);

			return json_encode([
				'status' => 'success',
				'coin' => $coin,
				'amount' =>	$res->amount,
				'updated' => $res->updated
			]);
		} else
			return $user;

	}

	public function all($api = null) {
		if ($api) {
			$user = Api::User($api);

			if ($user)
				return json_encode($user->MyBalances());
			
			return InvalidAPI();
		}

		return WaitingApiKey();

	}

}