<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use User;


class Balance extends Model
{
	protected $fillable = ['coin', 'amount'];


    public function sum($operation_id, $amount, $action, $description, $security = null) {
		if ($security)
			DB::beginTransaction();

		$totalBefore = Sum($this->amount ? $this->amount : 0, '0');

		$this->amount = Sum(strval($this->amount), strval($amount));

		$remove = $this->save();

		$user = User::Select('id')->Find($this->user_id);

		$extract = $user->extract()->create([
			'type' => true,
			'action' => $action,
			'operation_id' => $operation_id,
			'description' => $description,
			'before' => $totalBefore,
			'amount' => Sum(floatval($amount), '0'),
			'after' => $this->amount,
			'coin' => $this->coin
		]);

		if ($remove and $extract) {
			if ($security)
				DB::commit();

			return $extract;
		}


		if ($security)
			DB::rollback();

	}

	public function sub($operation_id, $amount, $action, $description, $security = null) {
		if ($security)
			DB::beginTransaction();

		$totalBefore = Sum($this->amount ? $this->amount : 0, '0');

		$this->amount = Sub(strval($this->amount), strval($amount));

		$remove = $this->save();

		$user = User::Select('id')->Find($this->user_id);

		$extract = $user->extract()->create([
			'type' => null,
			'action' => $action,
			'operation_id' => $operation_id,
			'description' => $description,
			'before' => $totalBefore,
			'amount' => Sum(strval($amount), '0'),
			'after' => $this->amount,
			'coin' => $this->coin
		]);

		if ($remove and $extract) {
			if ($security)
				DB::commit();

			return $extract;
		}


		if ($security)
			DB::rollback();

	}

	public function transferMail($data) {
		if (floatval($this->amount) >= floatval($data->amount)) {
			


			//aqui vamos pegar o destinatario
			$UserTo = User::Select('id')->Where('email', $data->address)->first();
			
			if ($UserTo) {

				if ($UserTo->id != $this->user_id) {
					DB::beginTransaction();

					//aqui vamos inserir o recebimento para o destinatario
					$InsertDepositsTo = $UserTo->deposit()->create([
						'coin' => $this->coin,
						'address' => $data->address,
						'amount' => Sum(floatval($data->amount), '0'),
						'fee' => '0.0000000',
						'fee_api' => '0.00000000',
						'module' => 'send',
						'status' => 'complete'
					]);

					//aqui vamos creditar o saldo para o destinatario
					$credit = $UserTo->balance()->firstOrCreate(['coin' => $this->coin])
						->sum($this->user_id, floatval($data->amount), 'transfer',
							'sending money to another user');


					//aqui vamos pegar o usuário dessa instancia
					$UserFrom = User::Select('id')->Find($this->user_id);

					//qui vamos remover o saldo do usuário dessa instancia
					$remove = $this->sub($UserTo->id, floatval($data->amount), 'transfer', 'sending money to another user');
					
					//aqui vamos inserir o saque no usuário da instancia
					$InsertWithdrawalsFrom = $UserFrom->withdrawal()->create([
						'address' => $data->address,
						'coin' => $this->coin,
						'amount' => Sum(floatval($data->amount), '0'),
						'fee' => '0.00000000',
						'fee_api' => '0.00000000',
						'module' => 'send',
						'status' => 'complete'
					]);

					

					if ($remove AND $credit AND $InsertWithdrawalsFrom AND $InsertDepositsTo) {
						DB::commit();

						return [
							'status' => 'success',
							'message' => 'good news! the money was sent to '.$data->address.' successfully',
							'data' => [
								'address' => $data->address,
								'coin' => Code($this->coin),
								'amount' => Sum(strval($data->amount), '0'),
								'fee' => '0.00000000'
							]
						];
					}

					DB::rollback();
				}

				return ['status' => 'error', 'message' => 'you can not send it to yourself, please inform another email']
			}

			return ['status' => 'error', 'message' => 'the email you entered does not exist, please provide a valid email address'];
		}
		

		
		return ['status' => 'error', 'message' => 'what a pity! you do not have enough balance to complete this transaction'];
	
	}

	public function Withdrawal($data) {   

		if (floatval($this->amount) >= floatval($data->amount)) {

			
			$Altcoin = Altcoin($this->coin);
			
			if (floatval($data->amount) > floatval($Altcoin['fees']['withdrawal'])) {
				DB::beginTransaction();
				
				//aqui vamos pegar o usuario a ser feito o saque
				$User = User::Select('id')->Find($this->user_id);

				//aqui vamos pegar o valor final
				$amount = Sub(
					floatval($data->amount), 
					floatval($Altcoin['fees']['withdrawal'])
				);
				

				$withdrawal = $User->withdrawal()->create([
					'address' => $data->address,
					'payment_id' => $data->payment_id ?? null,
					'coin' => $this->coin,
					'amount' => $amount,
					'fee' => Sum(floatval($Altcoin['fees']['withdrawal']), '0'),
					'fee_api' => Sum(floatval($Altcoin['fees']['withdrawal_api']), '0'),
					'url' => $data->url ?? null,
					'module' => $Altcoin['module']
				]);

				//aqui vamos remover o saldo do usuário
				$remove = $this->sub($withdrawal->id, floatval($data->amount), 'withdrawal', 'withdrawal of funds requested');
				


				if ($remove AND !empty($withdrawal)) {
					DB::commit();

					$array = [
						'status' => 'success',
						'message' => 'good news! you successfully withdraw the funds',
						'data' => ['address' => $data->address]
					];

					if ($data->payment_id)
						$array['data']['payment_id'] = $data->payment_id;

					$array['data']['coin'] = Code($this->coin);
					$array['data']['amount'] = $amount;
					$array['data']['fee'] = Sum(floatval($Altcoin['fees']['withdrawal']), '0');

					return $array;

				} else {
					DB::rollback();
					return ['status' => 'error', 'message' => 'an internal unknown error occurred on our part, please try again later'];
				}
				DB::rollback();

				return ['status' => 'error', 'message' => 'this request did not go through our security system, please try again'];
			}

			return ['status' => 'error', 'message' => 'you need to withdraw an amount greater than the rate that is '. Sum($Altcoin['fees']['withdrawal'], '0') . ' ' .strtoupper($Altcoin['coin'])];
		}

		
		return ['status' => 'error', 'message' => 'what a pity! you do not have enough balance to complete this transaction'];
	
	}
}
