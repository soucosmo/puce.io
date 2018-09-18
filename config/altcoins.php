<?php

return [

		$coin = 'btc' => [
			'id' => 1,
			'coin' => $coin,
			'name' => 'Bitcoin',
			'site' => 'https://bitcoin.com',
			'module' => 'bs',// CoinPayments
			'fees' => $fees = [
				'api_withdrawal' => '0.0001',
				'withdrawal' => '0.0002',
				'deposit' => '0.5'
			]
		],


		$coin = 'ltc' =>[
			'id' => 2,
			'coin' => $coin,
			'name' => 'Litecoin',
			'site' => 'https://litecoin.com',
			'module' => 'bs',// CoinPayments
			'fees' => [
				'api_withdrawal' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5'
			]
		],

		$coin = 'dash' => [
			'id' => 3,
			'coin' => $coin,
			'site' => 'https://dash.com',
			'name' => 'Dash',
			'module' => 'bs',// CoinPayments
			'fees' => [
				'api_withdrawal' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5'
			]
		],

		$coin = 'doge' => [
			'id' => 4,
			'coin' => $coin,
			'site' => 'https://dogecoin.com',
			'name' => 'Dogecoin',
			'module' => 'bs',// CoinPayments
			'fees' => [
				'api_withdrawal' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5'
			]
		],

		$coin = 'bshn' => [
			'id' => 5,
			'coin' => $coin,
			'name' => 'Bitnewcoin',
			'site' => 'https://bitnewcoin.com',
			'module' => 'bs',// CoinPayments
			'fees' => [
				'api_withdrawal' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5'
			]
		],

		$coin = 'vulc' => [
			'id' => 6,
			'coin' => $coin,
			'name' => 'Vulcano',
			'site' => 'https://vulcano.io',
			'module' => 'bs',// CoinPayments
			'fees' => [
				'api_withdrawal' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5'
			]
		],

		$coin = 'rdp' => [
			'id' => 7,
			'coin' => $coin,
			'name' => 'Ripped',
			'site' => 'https://rippedcoin.com',
			'module' => 'bs',// CoinPayments
			'fees' => [
				'api_withdrawal' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5'
			]
		],


];