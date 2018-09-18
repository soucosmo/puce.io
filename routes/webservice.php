<?php

$this->get('test', 'Test@index');

$this->group(['prefix' => 'api/{apikey?}', 'namespace' => 'Api\Response'], function() {

	$this->group(['prefix' => 'account'], function() {
		//cria uma conta
		$this->get('create/{name}/{email?}/{password?}/{pin?}', 'AccountAPI@create');

		//altera o name
		$this->get('change/name/{name}', 'AccountAPI@changeName');

		//altera o email
		$this->get('change/email/{email}', 'AccountAPI@changeEmail');

		//altera o password
		$this->get('change/password/{password}', 'AccountAPI@changePassword');

		//altera o pin
		$this->get('change/pin/{pin}', 'AccountAPI@changePin');

		//altera o code
		$this->get('change/code/{code}', 'AccountAPI@changeCode');

		//altera todos os dados da conta
		$this->get('change/{name}/{email?}/{password?}/{pin?}', 'AccountAPI@change');
		
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

	$this->get(['prefix' => 'transactions'], function() {
		//retorna todos os depositos em todas as moedas
		$this->get('deposits', 'TransactionsAPI@depositsAll');

		//retorna os depositos de uma determinada carteira ou moeda com ou sem limite de registros
		$this->get('deposits/{wallet_or_coin}/{limit?}', 'TransactionsAPI@deposits');

		//retorna os detalhes de alguma transação pela txid ou hash da transação
		$this->get('{tx}', 'TransactionsAPI@tx');

		//retorna todos os saques em todas as moedas
		$this->get('withdrawals', 'TransactionsAPI@withdrawalsAll');

		//retorna os saque para uma carteira com ou sem limite de registros
		$this->get('withdrawals/{wallet_or_coin}/{limit?}', 'TransactionsAPI@withdrawals');
	});


	$this->group(['prefix' => 'withdrawal'], function() {
		//realiza o saque de uma moeda de forma comum sem o id de pagamento
		$this->get('withdrawal/{coin?}/{amount?}/{address?}', 'WithdrawalAPI@withoutPaymentID');

		//realiza o saque de uma moeda com o id de pagamento
		$this->get('withdrawal/{coin?}/{amount?}/{address?}/{paymentID?}', 'WithdrawalAPI@withPaymentID');
	});

		
});