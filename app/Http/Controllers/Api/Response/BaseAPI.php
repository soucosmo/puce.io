<?php
namespace App\Http\Controllers\Api\Response;


use Api;
use User;


class BaseAPI extends \Controller {

	public static function check($api = null, $fields = ['id']) {
		if ($api) {
			$user = Api::User($api, $fields);

			if ($user)	
				return $user;					
				
			return InvalidAPI();
		}

		return WaitingApiKey();
	}



	public static function checkTransaction($api = null, $coin = null) {
		if ($api) {
			$user = Api::User($api);

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



	public static function checkAccount($api, $name, $email, $password, $pin, $fields = ['id']) {
		if ($api) {
			$user = Api::User($api, $fields);

			if ($user) {

				if ($name and strlen($name) >= 3 and strlen($name) < 30) {

					if(!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) and strlen($email) <= 120 and strlen($email) >= 10) {

						if (!empty($password) and strlen($password) >= 6 and strlen($pin) <= 50) {

							if (!empty($pin) and strlen($pin) >= 6 and strlen($pin) <= 50) {

								if ($user->email == $email or !User::Select('id')->Where('email', $email)->first())
									return $user;
									
								else
									return json_encode(['status' => 'error', 'message' => 'the informed email '.$email.' is already in use']);
							} else 
								return json_encode(['status' => 'error', 'message' => 'the pin entered is invalid, it must be between 6 and 50 characters']);

						} else
							return json_encode(['status' => 'error', 'message' => 'the password entered is invalid, it must be between 6 and 50 characters']);

					} else
						return json_encode(['status' => 'error', 'message' => 'the email must be between 10 and 120 characters long and must be valid']);
				} else
					return json_encode(['status' => 'error', 'message' => 'the email must be between 10 and 120 characters long and must be valid']);
			
			}

			return InvalidAPI();
		}		
		return WaitingApiKey();
	}
}