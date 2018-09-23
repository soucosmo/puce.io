<?php
namespace App\Http\Controllers;


class Puce extends \Controller {
	private $base, $url, $test;
	public function __construct($key = '') {
		$this->base = "https://cosmox.ga/api/{$key}";

		
	}


	public function account_create_test($name = '', $email = '', $password = '', $pin = '', $code = '') {
		$this->test['account_create'] = true;

		return $this->account_create($name, $email, $password, $pin, $code);
	}


	public function account_create($name = '', $email = '', $password = '', $pin = '', $code = '') {
		$this->url = "{$this->base}/account/create/{$name}/{$email}/{$password}/{$pin}/{$code}";

		if ( isset($this->test['account_create']) )
			return $this->url;
		
		return $this->curl();
	}


	public function account_change_test($name = '', $email = '', $password = '', $pin = '', $code = '') {
		$this->test['account_change'] = true;

		return $this->account_change($name, $email, $password, $pin, $code);
	}
	

	public function account_change($name = '', $email = '', $password = '', $pin = '', $code = '') {
		$this->url = "{$this->base}/account/change/{$name}/{$email}/{$password}/{$pin}/{$code}";

		if ( isset($this->test['account_change']) )
			return $this->url;
		
		return $this->curl();
	}


	public function account_change_name_test($name = '') {
		$this->test['account_change_name'] = true;

		return $this->account_change_name($name);
	}


	public function account_change_name($name = '') {
		$this->url = "{$this->base}/account/change/name/{$name}";

		if ( isset($this->test['account_change_name']) )
			return $this->url;
		
		return $this->curl();
	}


	public function account_change_email_test($email = '') {
		$this->test['account_change_email'] = true;

		return $this->account_change_email($email);
	}


	public function account_change_email($email = '') {
		$this->url = "{$this->base}/account/change/email/{$email}";

		if ( isset($this->test['account_change_email']) )
			return $this->url;
		
		return $this->curl();
	}


	public function account_change_password_test($password = '') {
		$this->test['account_change_password'] = true;

		return $this->account_change_password($password);
	}


	public function account_change_password($password = '') {
		$this->url = "{$this->base}/account/change/password/{$password}";

		if ( isset($this->test['account_change_password']) )
			return $this->url;
		
		return $this->curl();
	}


	public function account_change_pin_test($pin = '') {
		$this->test['account_change_pin'] = true;

		return $this->account_change_pin($pin);
	}


	public function account_change_pin($pin = '') {
		$this->url = "{$this->base}/account/change/pin/{$pin}";

		if ( isset($this->test['account_change_pin']) )
			return $this->url;
		
		return $this->curl();
	}


	public function account_change_code_test($code = '') {
		$this->test['account_change_code'] = true;

		return $this->account_change_code($code);
	}


	public function account_change_code($code = '') {
		$this->url = "{$this->base}/account/change/code/{$code}";

		if ( isset($this->test['account_change_code']) )
			return $this->url;
		
		return $this->curl();
	}


	public function address_test($coin = '', $url = '') {
		$this->test['address'] = true;

		return $this->address($coin, $url);
	}


	public function address($coin = '', $url) {
		$this->url = "{$this->base}/address/{$coin}/{$url}";

		if ( isset($this->test['address']) )
			return $this->url;
		
		return $this->curl();
	}


	public function addresses_test($coin = '') {
		$this->test['addresses'] = true;

		return $this->addresses($coin);
	}


	public function addresses($coin = '') {
		$this->url = "{$this->base}/addresses/{$coin}";

		if ( isset($this->test['addresses']) )
			return $this->url;
		
		return $this->curl();
	}


	public function altcoin_test($coin = '') {
		$this->test['altcoin'] = true;

		return $this->altcoin($coin, $url);
	}


	public function altcoin($coin = '') {
		$this->url = "{$this->base}/altcoin/{$coin}";

		if ( isset($this->test['altcoin']) )
			return $this->url;
		
		return $this->curl();		
	}


	public function altcoins_test() {
		$this->test['altcoins'] = true;

		return $this->altcoins();
	}


	public function altcoins() {
		$this->url = "{$this->base}/altcoins";

		if ( isset($this->test['altcoins']) )
			return $this->url;
		
		return $this->curl();		
	}


	public function balance_test($coin = '') {
		$this->test['balance'] = true;

		return $this->balance($coin);
	}


	public function balance($coin = '') {
		$this->url = "{$this->base}/balance/{$coin}";

		if ( isset($this->url['balance']) )
			return $this->url;
		
		return $this->curl();
	}


	public function balances_test() {
		$this->test['balance'] = true;

		return $this->balances();
	}


	public function balances() {
		$this->url = "{$this->base}/balances";

		if ( isset($this->url['balances']) )
			return $this->url;
		
		return $this->curl();
	}


	private function curl() {

		$ch = curl_init();

		curl_setopt($ch,CURLOPT_URL, str_replace(' ', '%20', $this->url) );
		curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15); //timeout in seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_ENCODING , 'gzip');
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		$response = curl_exec($ch);
		curl_close($ch);

		return json_decode($response);
	}


	public function deposits_test($coin_or_address = '', $limit = 5) {
		$this->test['deposits'] = true;

		return $this->deposits($coin_or_address, $limit);
	}


	public function deposits($coin_or_address = '', $limit = 5) {
		$this->url = "{$this->base}/deposits/{$coin_or_address}/{$limit}";

		if ( isset($this->test['deposits']) )
			return $this->url;
		
		return $this->curl();
	}


	public function my_address_test($coin = '') {
		$this->test['my_address'] = true;

		return $this->my_address($coin);
	}


	public function my_address($coin = '') {
		$this->url = "{$this->base}myaddress/{$coin}";

		if ( isset($this->test['myaddress']) )
			return $this->url;
		
		return $this->curl();
	}


	public function tx_test($tx = '') {
		$this->test['tx'] = true;

		return $this->tx($tx);
	}


	public function tx($tx = '') {
		$this->url = "{$this->base}/tx/{$tx}";

		if ( isset($this->test['tx']) )
			return $this->url;
		
		return $this->curl();
	}


	public function withdrawal_test(string $coin = '', string $address = '', $pay_or_amount = '', float $amount = 0) {
		$this->test['withdrawal'] = true;

		return $this->withdrawal($coin, $addresses, $pay_or_amount, $amount);

	}


	public function withdrawal(string $coin = '', string $address = '', $pay_or_amount = '', float $amount = 0) {

		if (floatval($pay_or_amount) > 0 and !is_string($pay_or_amount) and $address and $coin)
			$this->url = "{$this->base}/withdrawal/{$coin}/{$address}/{$pay_or_amount}";

		elseif (is_string($pay_or_amount) and $address and $coin)
			$this->url = "{$this->base}/withdrawal/{$coin}/{$address}/{$pay_or_amount}/{$amount}";


		if ( isset($this->test['withdrawal']) )
			return $this->url;
		
		return $this->curl();
	}


	public function withdrawals_test($coin_or_address = '', $limit = 5) {
		$this->test['withdrawals'] = true;

		return $this->withdrawals($coin_or_address, $limit);
	}


	public function withdrawals($coin_or_address = '', $limit = 5) {
		$this->url = "{$this->base}/withdrawals/{$coin_or_address}/{$limit}";

		if ( isset($this->test['withdrawals']) )
			return $this->url;
		
		return $this->curl();
	}


}











