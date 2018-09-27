<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use Altcoins;
use Api;
use Response;
use User;
use Cache;


class AltcoinsAPI extends \Controller {

	private $minutes = 120;

	public function all($api = '', $pin_key = '') {
		$user = Api::User($api, $pin_key);

		if ($user) {
			if (!Cache::has('altcoins')) {
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

				$array = ['status' => 'success', 'data' => $coins];

				Cache::put('altcoins', $array, $this->minutes);

			}

			return Response::Json(Cache::get('altcoins'));
		}

		return Response::Json(InvalidAPI());
	
	}


	public function from($api = '', $pin_key = '', $coin = '') {
		$user = Api::User($api, $pin_key);

		if ($user) {

			$coin = strtolower($coin);

			if (!Cache::has('altcoin_'.$coin)) {

				$coinx = Altcoin($coin);
				
				if ($coinx and !empty($coinx['id'])) {

					unset($coinx['id'], $coinx['module'], $coinx['fees']['withdrawal_api'], $coinx['fees']['deposit_api'], $coinx['rpc']);
					$coinx = [
						'status' => 'success',
						'data' => $coinx
					];

					Cache::put('altcoin_'.$coin, $coinx, $this->minutes);
				} else
					Cache::put('altcoin_'.$coin, InvalidCoin(), $this->minutes);
			}
			
			return Response::Json(Cache::get('altcoin_'.$coin));
		}

		return Response::Json(InvalidAPI());

	}
}