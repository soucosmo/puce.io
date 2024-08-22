<?php

return [


		$coin = 'btc' => [
			'id' => 1,
			'coin' => $coin,
			'name' => 'Bitcoin',
			'site' => 'https://bitcoin.com',
			'module' => 'cp',// CoinPayments
			'fees' => $fees = [
				'withdrawal_api' => '0.0001',
				'withdrawal' => '0.0002',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'ltc' =>[
			'id' => 2,
			'coin' => $coin,
			'name' => 'Litecoin',
			'site' => 'https://litecoin.com',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'dash' => [
			'id' => 3,
			'coin' => $coin,
			'site' => 'https://dash.com',
			'name' => 'Dash',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'doge' => [
			'id' => 4,
			'coin' => $coin,
			'site' => 'https://dogecoin.com',
			'name' => 'Dogecoin',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],


		$coin = 'vulc' => [
			'id' => 6,
			'coin' => $coin,
			'name' => 'Vulcano',
			'site' => 'https://vulcano.io',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'rdp' => [
			'id' => 7,
			'coin' => $coin,
			'name' => 'Ripped',
			'site' => 'https://rippedcoin.com',
			'module' => 'bs',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'bch' => [
			'id' => 8,
			'coin' => $coin,
			'name' => 'Bitcoin Cash',
			'site' => 'https://www.bitcoincash.org/',
			'module' => 'cp',// CoinPayments
			'fees' => $fees = [
				'withdrawal_api' => '0.0001',
				'withdrawal' => '0.0002',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],


		$coin = 'eth' => [
			'id' => 9,
			'coin' => $coin,
			'site' => 'https:/ethereum.org',
			'name' => 'Ethereum',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'etc' => [
			'id' => 10,
			'coin' => $coin,
			'site' => '',
			'name' => 'Ethereum Classic',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'lsk' => [
			'id' => 11,
			'coin' => $coin,
			'site' => 'https://lisk.io',
			'name' => 'Lisk',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'xvg' => [
			'id' => 12,
			'coin' => $coin,
			'site' => 'https://vergecurrency.com',
			'name' => 'Verge',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'zec' => [
			'id' => 13,
			'coin' => $coin,
			'site' => 'https://z.cash',
			'name' => 'Zcash',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

		$coin = 'zen' => [
			'id' => 14,
			'coin' => $coin,
			'site' => 'https://zensystem.io',
			'name' => 'ZenCash',
			'module' => 'cp',// CoinPayments
			'fees' => [
				'withdrawal_api' => '0.004',
				'withdrawal' => '0.001',
				'deposit' => '0.5',
				'deposit_api' => '0.5'
			]
		],

];