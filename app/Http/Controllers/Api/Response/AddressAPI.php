<?php
namespace App\Http\Controllers\Api\Response;



class AddressAPI extends \Controller {
	public function default($api = null, $coin = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
				$res = $user->MyAddress( Code($coin) );

				$array = [
					'status' => 'success',
					'coin' => $coin,
					'address' => $res->address,

					
				];

				if ($res->payment_id)
					$array['payment_id'] = $res->payment_id;

				$array['created'] = $res->created;

				return json_encode($array);
		} else
			return $user;

	}


	public function from($api = null, $coin = null, $url = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status)) {
			$res = $user->Address(Code($coin), $url);

			if ($res) {
				$array = [
					'status' => 'success',
					'coin' => $coin,
					'address' => $res->address				
				];
				
				if ($res->payment_id)
					$array['payment_id'] = $res->payment_id;

				if ($url)
					$array['url'] = $url;

				$array['created'] = $res->created;
				return json_encode($array);
			} else
				return AddressNotFound();
		} else
			return $user;

	}

	public function all($api = null, $coin = null) {
		$user = BaseAPI::checkTransaction($api, $coin);

		if (!empty($user) and empty(json_decode($user)->status))
			return json_encode($user->AddressAll( Code($coin) ));
		else
			return $user;

			
	}


}