<?php

$this->get('test', 'Test@index');

$this->group(['prefix' => 'api/{apikey?}', 'namespace' => 'Api\Response'], function() {

	$this->group(['prefix' => 'account'], function() {
		//cria uma conta
		$this->get('create/{name}/{email?}/{password?}/{pin?}', 'AccountAPI@create');

		$this->group(['prefix' => 'change'], function() {
			//altera o name
			$this->get('name/{name}', 'AccountAPI@changeName');

			//altera o email
			$this->get('email/{email}', 'AccountAPI@changeEmail');

			//altera o password
			$this->get('password/{password}', 'AccountAPI@changePassword');

			//altera o pin
			$this->get('pin/{pin}', 'AccountAPI@changePin');

			//altera o code
			$this->get('code/{code}', 'AccountAPI@changeCode');

			//altera todos os dados da conta
			$this->get('{name}/{email?}/{password?}/{pin?}', 'AccountAPI@change');
		});
	
	});
	


	$this->group(['prefix' => 'altcoins'], function() {
		//retorna todas as moedas
		$this->get('', 'AltcoinsAPI@all');

		//retorna os dados de uma determinada moeda
		$this->get('/{coin}', 'AltcoinsAPI@from');
	});
	


	//retorna o saldo de uma determinada moeda
	$this->get('balance/{coin?}', 'BalanceAPI@from');

	//retorna todos os saldos
	$this->get('balances', 'BalanceAPI@all');

	//retorna o endereço principal do usuário
	$this->get('myaddress/{coin?}', 'AddressAPI@default');

	//gera um novo endereço de uma determinada moeda com ou sem retorno via url
	$this->get('address/{coin?}/{url?}', 'AddressAPI@from')->Where('url', '.*');

	//retorna todos os endereços de uma determinada moeda
	$this->get('addresses/{coin?}', 'AddressAPI@all');



	$this->group(['prefix' => 'transactions'], function() {

		$this->group(['prefix' => 'deposits'], function() {
			//retorna todos os depositos em todas as moedas
			$this->get('', 'TransactionsAPI@depositsAll');

			//retorna os depositos de uma determinada carteira ou moeda com ou sem limite de registros
			$this->get('{wallet_or_coin}/{limit?}', 'TransactionsAPI@deposits');

		});
		


		//retorna os detalhes de alguma transação pela txid ou hash da transação
		$this->get('{tx}', 'TransactionsAPI@tx');


		$this->group(['prefix' => 'withdrawals'], function() {
			//retorna todos os saques em todas as moedas
			$this->get('', 'TransactionsAPI@withdrawalsAll');

			//retorna os saque para uma carteira com ou sem limite de registros
			$this->get('{wallet_or_coin}/{limit?}', 'TransactionsAPI@withdrawals');
		});
			
	});



	$this->group(['prefix' => 'withdrawal'], function() {
		//realiza o saque de uma moeda de forma comum sem o id de pagamento
		$this->get('{coin?}/{amount?}/{address?}', 'WithdrawalAPI@withoutPaymentID');

		//realiza o saque de uma moeda com o id de pagamento
		$this->get('{coin?}/{amount?}/{address?}/{paymentID?}', 'WithdrawalAPI@withPaymentID');
	});
		
});