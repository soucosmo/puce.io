<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use Altcoins;
use Response;
use Base
use User;

class AltcoinsAPI extends \Controller {

	public function all($api = '', $pin_key = '') {
		$user = Api::User($api, $pin_key);

		if ($user) {
			$coins = [];
			foreach (Altcoins() as $data) {

				$coins[$data['coin']] = [
					'coin' => $data['coin'],
					'name' => $data['name'],
					'site' => $data['site'],
					'fees' => [
						'deposit' => floatval($data['fees']['deposit']),
						'withdrawal' => floatval($data['fees']['withdrawal']),
					]

				]; 
			}

			return Response::Json(['status' => 'success', 'data' => $coins]);
		}

		return Response::Json(InvalidAPI());
	
	}


	public function from($api = '', $pin_key = '', $coin = '') {
		$user = Api::User($api, $pin_key);

		if ($user) {

			$coin = strtolower($coin);

			$coin = Altcoin($coin);
			
			if ($coin and !empty($coin['id'])) {

				unset($coin['id'], $coin['module'], $coin['fees']['api_withdrawal']);
				$coin = [
					'status' => 'success',
					'data' => $coin
				];

				return Response::Json($coin);
			} else
				return Response::Json(InvalidCoin());
		}

		return Response::Json(InvalidAPI());

	}
}