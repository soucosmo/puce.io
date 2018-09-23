function Puce(key = '') {
	var _base, _url;
	this._base = 'https://cosmox.ga/api'+key;


	this.account_create_test = function(name = '', email = '', password = '', pin = '', code = '') {
		this._test_account_create = true;

		return this.account_create(name, email, password, pin, code);
	}


	this.account_create = function(name = '', email = '', password = '', pin = '', code = '') {
		this._url = this._base+'/account/create/'+email+'/'+{password}+'/'+pin+'/'+code;

		if ( this._test_account_create ) {
			return this._url;
		}

		return this._curl();
	}


	this.account_change_test = function(name = '', email = '', password = '', pin = '', code = '') {
		this._test_account_change = true;

		return this.account_change(name, email, password, pin, code);
	}


	this.account_change = function(name = '', email = '', password = '', pin = '', code = '') {
		this._url = this._base+'/account/change/'+email+'/'+{password}+'/'+pin+'/'+code;

		if ( this._test_account_change ) {
			return this._url;
		}

		return this._curl();
	}


	this.account_change_name_test = function(name = '') {
		this._test_account_change_name = true;

		return this.account_change_name(name);
	}


	this.account_change_name = function(name = '') {
		this._url = this._base+'/account/change/name/'+name

		if ( this._test_account_change_name ) {
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


	this.account_change_code_test = function(code = '') {
		this._test_account_change_code = true;

		return this.account_change_code(code);
	}


	this.account_change_code = function(code = '') {
		this._url = this._base+'/account/change/code/'+pin

		if ( this._test_account_change_code ) {
			return this._url;
		}

		return this._curl();
	}




	this._curl = function() {
		return 'curl';
	}
}