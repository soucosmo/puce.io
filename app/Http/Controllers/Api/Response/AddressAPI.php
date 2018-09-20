<?php
namespace App\Http\Controllers\Api\Response;



class AddressAPI extends \Controller {
	public function default($api = null, $coin = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
				$res = $user->MyAddress( Code($coin) );

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
			$res = $user->Address(Code($coin), $url);

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
			return json_encode($user->AddressAll( Code($coin) );
		else
			return $user;

			
	}


}