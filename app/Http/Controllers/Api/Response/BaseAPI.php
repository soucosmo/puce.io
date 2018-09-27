<?php
namespace App\Http\Controllers\Api\Response;


use Api;
use User;


class BaseAPI extends \Controller {

	public static function check($api = '', $pin_key = '', $fields = ['id', 'pin']) {
		if ($api) {
			$user = Api::User($api, $pin_key, $fields);

			if ($user)	
				return $user;					
				
			return InvalidAPI();
		}

		return WaitingApiKey();
	}



	public static function checkTransaction($api = '', $pin_key = '', $coin = '') {
		if ($api) {
			$user = Api::User($api, $pin_key);

			if ($user) {
				if ($coin){
					if (Code($coin))
						return $user;
					else
						return InvalidCoin();					
				} else
					return CoinPending();

			}

			return InvalidAPI();
		}

		return WaitingApiKey();
	}



	public static function checkWithdrawal($api = '', $pin_key = '', $coin = '', $amount = '', $address = '') {
		if ($api) {
			$user = Api::User($api, $pin_key);

			if ($user) {
				if ($coin){
					if (Code($coin)) {
						if (is_numeric($amount) and floatval($amount) > 0)

							if ($address and strlen($address) >= 10 and strlen($address) <= 256)
								return $user;
							else
								return InvalidAddress();
						else
							return InvalidAmount();
					} else
						return InvalidCoin();					
				} else
					return CoinPending();

			}

			return InvalidAPI();
		}

		return WaitingApiKey();
	}



	public static function checkAccount($api = '', $pin_key = '',$name = '', $email = '', $password = '', $pin = '', $fields = ['id', 'pin']) {
		if ($api) {
			$user = Api::User($api, $pin_key, $fields);

			if ($user) {

				if ($name and strlen($name) >= 3 and strlen($name) < 30) {

					if(!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) and strlen($email) <= 120 and strlen($email) >= 10) {

						if (!empty($password) and strlen($password) >= 6 and strlen($pin) <= 50) {

							if (!empty($pin) and strlen($pin) >= 6 and strlen($pin) <= 50) {

								if ($user->email == $email or !User::Select('id')->Where('email', $email)->first())
									return $user;
									
								else
									return ['status' => 'error', 'message' => 'the informed email '.$email.' is already in use'];
							} else 
								return ['status' => 'error', 'message' => 'the pin entered is invalid, it must be between 6 and 50 characters'];

						} else
							return ['status' => 'error', 'message' => 'the password entered is invalid, it must be between 6 and 50 characters'];

					} else
						return ['status' => 'error', 'message' => 'the email must be between 10 and 120 characters long and must be valid'];
				} else
					return ['status' => 'error', 'message' => 'the email must be between 10 and 120 characters long and must be valid'];
			
			}

			return InvalidAPI();
		}		
		return WaitingApiKey();
	}
}