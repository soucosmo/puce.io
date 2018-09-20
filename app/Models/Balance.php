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
			DB::beginTransaction();


			//aqui vamos pegar o destinatario
			$UserTo = User::Select('id')->Where('email', $data->email)->first();

			//aqui vamos inserir o recebimento para o destinatario
			$InsertDepositsTo = $UserTo->deposit()->create([
				'coin' => $this->coin,
				'address' => $data->email,
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
				'address' => $data->email,
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
					'message' => 'Good news! The money was sent to '.$data->email.' successfully.',
					'address' => $data->email,
					'coin' => Code($this->coin),
					'amount' => Sum(strval($data->amount), '0'),
					'fee' => '0.00000000'
				];
			}

		}
		

		DB::rollback();
		return ['status' => 'error', 'message' => 'What a pity! you do not have enough balance to complete this transaction.'];
	
	}
}
