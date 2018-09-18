<?php
namespace App\Http\Controllers\Api\Response;


use Altcoins;


class AltcoinsAPI extends \Controller {

	public function all() {
		return json_encode(['status' => 'success', 'data' => Altcoins()]);
	}


	public function from($api, $coin) {
		$coin = strtolower($coin);

		$coin = Altcoin($coin);
		
		if ($coin and !empty($coin['id'])) {

			unset($coin['id'], $coin['module'], $coin['fees']['api_withdrawal']);
			$coin = array_merge(['status' => 'success'], $coin);

			return $coin;
		} else
			return InvalidCoin();

	}
}