<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use Api;
use Response;

class BalanceAPI extends \Controller {
	public function from($api = '', $pin_key = '', $coin = '') {
		$user = BaseAPI::checkTransaction($api, $pin_key, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
			$res = $user->MyBalance($coin);

			return Response::Json([
				'status' => 'success',
				'data' => [
					'coin' => $coin,
					'amount' =>	$res->amount,
					'updated' => $res->updated
				]
			]);
		} else
			return Response::Json($user);

	}

	public function all($api = '', $pin_key = '') {
		if ($api) {
			$user = Api::User($api_key, $pin);

			if ($user)
				return Response::Json($user->MyBalances());
			
			return Response::Json(InvalidAPI());
		}

		return Response::Json(WaitingApiKey());

	}

}