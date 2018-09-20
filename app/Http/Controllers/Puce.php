<?php
namespace App\Http\Controllers;


class Base extends \Controller {
	private $url, $test;
	public function __construct($key = '') {
		$this->url = 'https://cosmox.ga/api/'.$key;
		
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


	public function name($name = '') {
		if (stripos($this->url, ';name'))
			return $this;
		elseif ($name)
			$this->url .= ';name;'.$name;

		return $this;
	}


	public function email($email = '') {
		if (stripos($this->url, ';email'))
			return $this;
		elseif ($email)
			$this->url .= ';email;'.$email;

		return $this;
	}


	public function password($password = '') {
		if (stripos($this->url, ';password'))
			return $this;
		elseif ($password)
			$this->url .= ';password;'.$password;

		return $this;
	}


	public function pin($pin = '') {
		if (stripos($this->url, ';pin'))
			return $this;
		elseif ($pin)
			$this->url .= ';pin;'.$pin;

		return $this;
	}

	public function code($code = '') {
		if (stripos($this->url, ';code'))
			return $this;
		elseif ($code)
			$this->url .= ';code;'.$code;

		return $this;
	}


	public function accountCreateTest(string $name = '', string $email = '', string $password = '', string $pin = '', string $code = '') {
		$this->test = true;
		return $this->accountCreate($name, $email, $password, $pin, $code);
	}

	public function accountCreate(string $name = '', string $email = '', string $password = '', string $pin = '', string $code = '') {
		$this->account()->create();

		if ($name) $this->name($name);

		if ($email)	$this->email($email);

		if ($password) $this->password($password);

		if ($pin) $this->pin($pin);

		if ($code) $this->code($code);

		if ($this->test)
			return $this->debug();
		else
			return $this->apply();

	}

	public function accountChangeTest(string $name = '', string $email = '', string $password = '', string $pin = '', string $code = '') {
		$this->test = true;
		return $this->accountChange($name, $email, $password, $pin, $code);
	}


	public function accountChange(string $name = '', string $email = '', string $password = '', string $pin = '', string $code = '') {
		$this->account()->change();

		if ($name) $this->name($name);

		if ($email)	$this->email($email);

		if ($password) $this->password($password);

		if ($pin) $this->pin($pin);

		if ($code) $this->code($code);

		if ($this->test)
			return $this->debug();
		else
			return $this->apply();
	}
	

	public function address(string $coin = '') {
		$this->url .= ';address;'.$coin;

		return $this->curl();
	}


	public function addresses(string $coin = '') {
		$this->url .= ';addresses;'.$coin;

		return $this->curl();
	}


	public function balance(string $coin = '') {
		$this->url .= ';balance;'.$coin;

		return $this->curl();
	}

	public function balances() {
		$this->url .= '/balances';

		return $this->curl();
	}


	public function curl() {

		$ch = curl_init();

		curl_setopt($ch,CURLOPT_URL, str_replace(' ', '%20', $this->treatment()) );
		curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 25);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15); //timeout in seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}


	public function myAddress(string $coin) {
		$this->url .= ';myaddress;'.$coin;

		return $this->curl();
	}


	public function withdrawal(string $coin = '', string $address = '', $pay_or_amount = '', float $amount = 0) {

		if (floatval($pay_or_amount) > 0 and !is_string($pay_or_amount))

			$this->url .= ';withdrawal;'.$coin.';'.$address.';'.$pay_or_amount;

		elseif (is_string($pay_or_amount))

			$this->url .= ';withdrawal;'.$coin.';'.$address.';'.$pay_or_amount.';'.$amount;

		return $this->curl();	

	}

	public function test() {
		$this->test = true;
	}

	public function debug() {

		return $this->treatment();

	}

	public function ttaccount($arrayBase = array()) {
		$array = array();

		$url = [$arrayBase[0], $arrayBase[1], $arrayBase[2]];


		unset($arrayBase[0], $arrayBase[1], $arrayBase[2]);

		foreach ($arrayBase as $data) { 

			if (isset($array['name']) and $array['name'] == '') {
				$array['name'] = $data;
			}

			if (!isset($array['name']) and $data == 'name')
				$array['name'] = '';

			if (isset($array['email']) and $array['email'] == '') {
				$array['email'] = $data;
			}

			if (!isset($array['email']) and $data == 'email')
				$array['email'] = '';

			if (isset($array['password']) and $array['password'] == '') {
				$array['password'] = $data;
			}

			if (!isset($array['password']) and $data == 'password')
				$array['password'] = '';

			if (isset($array['pin']) and $array['pin'] == '') {
				$array['pin'] = $data;
			}

			if (!isset($array['pin']) and $data == 'pin')
				$array['pin'] = '';

			if (isset($array['code']) and $array['code'] == '') {
				$array['code'] = $data;
			}

			if (!isset($array['code']) and $data == 'code')
				$array['code'] = '';


		}

	

		if ($url[2] == 'create') {
			$this->url = str_replace(';name', '', $this->url);
			$this->url = str_replace(';email', '', $this->url);
			$this->url = str_replace(';password', '', $this->url);
			$this->url = str_replace(';pin', '', $this->url);
			$this->url = str_replace(';code', '', $this->url);

			if (!isset($array['name']))
				return json_encode(['status' => 'error', 'message' => 'you need to enter a name using ->name(\'Your Name\')']);
			if (!isset($array['email']))
				return json_encode(['status' => 'error', 'message' => 'you need to enter a email using ->email(\'Your Email\')']);
			if (!isset($array['password']))
				return json_encode(['status' => 'error', 'message' => 'you need to enter a password using ->password(\'Your Password\')']);
			if (!isset($array['pin']))
				return json_encode(['status' => 'error', 'message' => 'you need to enter a pin using ->pin(\'Your Pin\')']);

			$this->url = implode(';', $url).';'. $array['name'].';' . $array['email'].';' . $array['password'].';' . $array['pin'].';' . (!empty($array['code']) ? $array['code'].';' : '');
			unset($url, $array, $arrayBase);

		}

	}


	public function treatment() {
	
		$array = explode(';', $this->url);
	
		if ($array[1] == 'account')
			$error = $this->ttaccount($array);
		elseif ($array[1] == '')
			echo "";


		if ($error)
			return $error;


		unset($array);
		
		return str_replace(';', '/', $this->url);
	}

	public function apply() {

		return $this->curl();
        
	}

}


class Puce extends Base {


	public function __construct($api = '') {
		parent::__construct($api);
	}

	


	


	public function index() {

		
		$Puce = new $this('D12EDDDD7DF0192EEC538DD8140C38468A6F8D52');

		

		dd(
			$Puce->accountCreateTest('Rittynha Dias', 'rittynhadias@hotmail.com', 'Cosmo9able', 'Cosmo9able')
		);


		//$res = file_get_contents('https://cosmox.ga/api/D12EDDDD7DF0192EEC538DD8140C38468A6F8D52/account/create/Cosmo%20Andr%C3%A9/cosmo_moraes@hotmail.com/senhateste123/meupin123456/xablaucode');
		//dd($res);

























	}
}














