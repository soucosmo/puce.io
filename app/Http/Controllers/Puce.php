<?php
namespace App\Http\Controllers;


class Base extends \Controller {
	private $url;
	public function __construct($key = '') {
		if (config('app.env') == 'local')
			$this->url = 'http://127.0.0.1:8000/api/'.$key;
		else
			$this->url = 'https://puce.io/api/'.$key;
		
	}


	public function account() {
		if (stripos($this->url, ';account'))
			return $this;
		else
			$this->url .= ';account';

		return $this;
	}


	public function change() {
		if (stripos($this->url, ';create') or stripos($this->url, ';change'))
			return $this;
		elseif (stripos($this->url, ';account'))
			$this->url .= ';change';
		return $this;
	}


	public function create() {
		if (stripos($this->url, ';change') or stripos($this->url, ';create'))
			return $this;
		elseif (strpos($this->url, ';account'))
			$this->url .= ';create';

		return $this;
	}


	public function name($name = null) {
		if (stripos($this->url, ';name'))
			return $this;
		else
			$this->url .= ';name;'.$name;

		return $this;
	}


	public function email($email = null) {
		if (stripos($this->url, ';email'))
			return $this;
		else
			$this->url .= ';email;'.$email;

		return $this;
	}


	public function password($password = null) {
		if (stripos($this->url, ';password'))
			return $this;
		else
			$this->url .= ';password;'.$password;

		return $this;
	}


	public function pin($pin = null) {
		if (stripos($this->url, ';pin'))
			return $this;
		else
			$this->url .= ';pin;'.$pin;

		return $this;
	}

	public function code($code = null) {
		if (stripos($this->url, ';code'))
			return $this;
		else
			$this->url .= ';code;'.$code;

		return $this;
	}


	public function accountCreate(string $email = null, string $password = null, string $pin = null) {
		$this->url .= '/account/create/'.$email.'/'.$password.'/'.$pin;

		return $this->curl();
	}


	public function accountChange(string $email = null, string $password = null, string $pin = null, string $code = null) {
		$this->url .= '/account/change/'.$email.'/'.$password.'/'.$pin;

		return $this->curl();
	}
	

	public function address(string $coin = null) {
		$this->url .= '/address/'.$coin;

		return $this->curl();
	}


	public function addresses(string $coin = null) {
		$this->url .= '/addresses/'.$coin;

		return $this->curl();
	}


	public function balance(string $coin = null) {
		$this->url .= '/balance/'.$coin;

		return $this->curl();
	}

	public function balances() {
		$this->url .= '/balances';

		return $this->curl();
	}


	public function curl() {

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$return = curl_exec($ch);

		curl_close($ch);

		return $return;
	}


	public function myAddress(string $coin) {
		$this->url .= '/myaddress/'.$coin;

		return $this->curl();
	}


	public function withdrawal(string $coin = null, string $address = null, $pay_or_amount = null, float $amount = null) {

		if (floatval($pay_or_amount) > 0 and !is_string($pay_or_amount))

			$this->url .= '/withdrawal/'.$coin.'/'.$address.'/'.$pay_or_amount;

		elseif (is_string($pay_or_amount))

			$this->url .= '/withdrawal/'.$coin.'/'.$address.'/'.$pay_or_amount.'/'.$amount;

		return $this->curl();	

	}


	public function treatment() {
	
		$array = explode(';', $this->url);
	
		if ($array[1] == 'account')


		return $array;
	}

}


class Puce extends Base {


	public function __construct($api = '') {
		parent::__construct($api);
	}


	public function test() {
		return $this->treatment();
	}


	public function index() {
		$Puce = new $this('D12EDDDD7DF0192EEC538DD8140C38468A6F8D52');
		dd(
			$Puce->account()->create()->name("Cosmo André")->email('cosmo_moraes@hotmail.com')->password('123456')->pin('654321')->code('1122')->test()
		);



























































	}
}