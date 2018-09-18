<?php
namespace App\Http\Controllers\Api\Returns;

use Altcoins;
use Auxiliar;
use App\Http\Requests\ReturnDeposit;
use User;

use App\Http\Controllers\Api\Returns\SendReturn;


class ReturnDepositController extends \Controller {

	public function index(ReturnDeposit $data) {

		echo $data->status;

		if ($data->status >= 100) {		
			$info = Auxiliar::getData($data->address);
			//dd($info);

			$array = $this->data($info, $data);

			$res = User::Find($info['user_id'])->balances()
			->firstOrCreate(['coin' => strtolower($data->currency)])
			->credit($array);


			if (!empty($info['url'])) {
				$return = new SendReturn;

				$return->send($info['url'], (array) $array);
			}

		}
		
		
	}



	public function data($info, $data) {

		$altcoins = Altcoins::Where('coin', strtolower($data->currency))->first();

		$fee = ($data->amount * $altcoins->percentual) / 100;


		return (object) [
			'status' => 'success',
			'address' => $data->address,
			'tx_id' => $data->txn_id,
			'amount_original' => $data->amount,
			'amount' => $data->amount - $fee,
			'coin' => strtolower($data->currency),
			'fee' => $fee,
			'fee_cp' => $data->fee ? $data->fee : 0,

		];

	}


}