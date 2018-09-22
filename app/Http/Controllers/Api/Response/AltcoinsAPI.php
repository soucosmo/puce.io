<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use Altcoins;


class AltcoinsAPI extends \Controller {

	public function all() {
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

		

		return json_encode(['status' => 'success', 'data' => $coins]);
	}


	public function from($api, $coin) {
		$coin = strtolower($coin);

		$coin = Altcoin($coin);
		
		if ($coin and !empty($coin['id'])) {

			unset($coin['id'], $coin['module'], $coin['fees']['api_withdrawal']);
			$coin = [
				'status' => 'success',
				'data' => $coin
			];

			return $coin;
		} else
			return InvalidCoin();

	}
}