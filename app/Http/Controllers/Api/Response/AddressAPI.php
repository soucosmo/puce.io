<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');

use Response;


class AddressAPI extends \Controller {
	public function default($api = '', $pin_key = '', $coin = '') {
		$user = BaseAPI::checkTransaction($api, $pin_key, $coin);

		if (!empty($user) and empty( $user['status']) ) {
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

				return Response::Json($array);
		} else
			return Response::Json($user);

	}


	public function from($api = '', $pin_key = '', $coin = '', $url = '') {
		$user = BaseAPI::checkTransaction($api, $pin_key, $coin);

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
				return Response::Json($array);
			} else
				return Response::Json(AddressNotFound());
		} else
			return Response::Json($user);

	}

	public function all($api = '', $pin_key = '', $coin = '') {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty($user['status']))
			return Response::Json($user->AddressAll( Code($coin) ));
		else
			return Response::Json($user);

			
	}


}