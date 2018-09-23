<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


class AddressAPI extends \Controller {
	public function default($api = null, $coin = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
				$res = $user->MyAddress( Code($coin) );

				$array = [
					'status' => 'success',
					'data' => [
						'coin' => $coin,
						'address' => $res->address,
					]
					
				];

				if ($res->payment_id)
					$array['data']['payment_id'] = $res->payment_id;

				$array['data']['created'] = $res->created;

				return json_encode($array);
		} else
			return json_encode($user);

	}


	public function from($api = null, $coin = null, $url = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty($user['status'])) {
			$res = $user->Address(Code($coin), $url);

			if ($res) {
				$array = [
					'status' => 'success',
					'data' => [
						'coin' => $coin,
						'address' => $res->address]			
				];
				
				if ($res->payment_id)
					$array['data']['data']['payment_id'] = $res->payment_id;

				if ($url)
					$array['data']['url'] = $url;

				$array['data']['created'] = $res->created;
				return json_encode($array);
			} else
				return json_encode(AddressNotFound());
		} else
			return json_encode($user);

	}

	public function all($api = null, $coin = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty($user['status']))
			return json_encode($user->AddressAll( Code($coin) ));
		else
			return json_encode($user);

			
	}


}