function Puce(key = '', pin = '') {
	var _base, _url;
	this._base = 'https://puce.io/api/'+key+'/'+pin;


	this.account_create_test = function(email = '', password = '', pin = '') {
		this._test_account_create = true;

		return this.account_create(email, password, pin);
	}


	this.account_create = function(email = '', password = '', pin = '') {
		this._url = this._base+'/account/create/'+email+'/'+{password}+'/'+pin;

		if ( this._test_account_create ) {
			return this._url;
		}

		return this._curl();
	}


	this.account_change_test = function(email = '', password = '', pin = '') {
		this._test_account_change = true;

		return this.account_change(name, email, password, pin, code);
	}


	this.account_change = function(email = '', password = '', pin = '') {
		this._url = this._base+'/account/change/'+email+'/'+{password}+'/'+pin;

		if ( this._test_account_change ) {
			return this._url;
		}

		return this._curl();
	}




	this.account_change_email_test = function(email = '') {
		this._test_account_change_email = true;

		return this.account_change_email(email);
	}


	this.account_change_email = function(email = '') {
		this._url = this._base+'/account/change/email/'+email

		if ( this._test_account_change_email ) {
			return this._url;
		}

		return this._curl();
	}


	this.account_change_password_test = function(password = '') {
		this._test_account_change_password = true;

		return this.account_change_password(password);
	}


	this.account_change_password = function(password = '') {
		this._url = this._base+'/account/change/password/'+password

		if ( this._test_account_change_password ) {
			return this._url;
		}

		return this._curl();
	}


	this.account_change_pin_test = function(pin = '') {
		this._test_account_change_pin = true;

		return this.account_change_pin(pin);
	}


	this.account_change_pin = function(pin = '') {
		this._url = this._base+'/account/change/pin/'+pin

		if ( this._test_account_change_pin ) {
			return this._url;
		}

		return this._curl();
	}



	this.address_test = function(coin = '', url = '') {
		this._test_address = true;

		return this.address(coin, url);
	}


	this.address = function(coin = '', url = '') {
		this._url = this._base+'/address/'+coin+'/'+url;

		if ( this._test_address ) {
			return this._url;
		}

		return this._curl();
	}


	this.addresses_test = function(coin = '') {
		this._test_addresses = true;

		return this.addresses(coin);
	}


	this.addresses = function(coin = '') {
		this._url = this._base+'/addresses/'+coin;

		if ( this._test_addresses ) {
			return this._url;
		}

		return this._curl();
	}


	this.altcoin_test = function(coin = '') {
		this._test_altcoin = true;

		return this.altcoin(coin);
	}


	this.altcoin = function(coin = '') {
		this._url = this._base+'/altcoin/'+coin;

		if ( this._test_altcoin ) {
			return this._url;
		}

		return this._curl();
	}


	this.altcoins_test = function() {
		this._test_altcoins = true;

		return this.altcoins();
	}


	this.altcoins = function() {
		this._url = this._base+'/altcoins';

		if ( this._test_altcoins ) {
			return this._url;
		}

		return this._curl();
	}


	this.balance_test = function(coin = '') {
		this._test_balance = true;

		return this.balance(coin);
	}


	this.balance = function(coin = '') {
		this._url = this._base+'/balance/'+coin;

		if ( this._test_balance ) {
			return this._url;
		}

		return this._curl();
	}


	this.balances_test = function() {
		this._test_balances = true;

		return this.balances();
	}


	this.balances = function() {
		this._url = this._base+'/balances';

		if ( this._test_balances ) {
			return this._url;
		}

		return this._curl();
	}


	this._curl = function() {
		return 'metodo curl aqui';
	}


	this.deposits_test = function(coin_or_address = '', limit = 5) {
		this._test_deposits = true;

		return this.deposits(coin_or_address, limit);
	}


	this.deposits = function(coin_or_address = '', limit = 5) {
		this._url = this._base+'/deposits/'+coin_or_address+'/'+limit;

		if ( this._test_deposits ) {
			return this._url;
		}

		return this._curl();
	}


	this.my_address_test = function(coin = '') {
		this._test_my_address = true;

		return this.my_address(coin);
	}


	this.my_address = function(coin = '') {
		this._url = this._base+'/myaddress/'+coin;

		if ( this._test_my_address ) {
			return this._url;
		}

		return this._curl();
	}


	this.tx_test = function(tx = '') {
		this._test_tx = true;

		return this.tx(tx);
	}


	this.tx = function(tx = '') {
		this._url = this.base + '/tx/'+tx;

		if ( this._test_tx ) {
			return this._url;
		}

		return this._curl();
	}


	this.withdrawal_test = function(coin = '', amount = '', address = '', pay_or_url = '', url = '') {
		this._test_withdrawal = true;

		return this.withdrawal(coin, amount, address, pay_or_url, url);
	}


	this.withdrawal = function(coin = '', amount = '', address = '', pay_or_url = '', url = '') {
		if ( address.indexOf('@') > 0 ) {
			this._url = this._base+'/withdrawal/'+coin+'/'+amount+'/'+address;

		} else if ( pay_or_url != '' && url == '' ) {
			this._url = this._base+'/withdrawal/'+coin+'/'+amount+'/'+address+'/'+pay_or_url;

		} else if ( url ) {
			this._url = this._base+'/withdrawal/'+coin+'/'+amount+'/'+address+'/'+pay_or_url+'/'+url;

		}


		if ( this._test_withdrawal ) {
			return this._url;
		}


		this._curl();
	}


	this.withdrawals_test = function(coin_or_address = '', limit = 5) {
		this._test_withdrawals = true;

		return this.withdrawals(coin_or_address, limit);
	}


	this.withdrawals = function(coin_or_address = '', limit = 5) {
		this._url = this._base+'/withdrawals/'+coin_or_address+'/'+limit;

		if ( this._test_withdrawals ) {
			return this._url;
		}

		return this._curl();
	}

	
}