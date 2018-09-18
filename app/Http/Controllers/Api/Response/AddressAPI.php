<?php
namespace App\Http\Controllers\Api\Response;


use ApiKey;


class AddressAPI extends \Controller {
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


	public function from($api = null, $coin = null, $url = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
			$res = $user->Address($coin, $url);

			return json_encode([
				'status' => 'success',
				'coin' => $coin,
				'address' => $res->address,
				'url' => $url,
				'created' => $res->created
			]);
		} else
			return $user;

	}

	public function all($api = null, $coin = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status))
			return json_encode($user->AddressAll($coin));
		else
			return $user;

			
	}


}