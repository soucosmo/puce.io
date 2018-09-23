<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use User;
use Hash;
use Crypt;


class AccountAPI extends \Controller {
	public function create($api = null, $name = null, $email = null, $password = null, $pin = null, $code = null) {
		$email = strtolower($email);

		$user = BaseAPI::checkAccount($api, $name, $email, $password, $pin);
		
		if (!empty($user->id)) {
			$res = User::create([
				'name' => mb_convert_case($name, MB_CASE_TITLE),
				'email' => $email,
				'password' => Hash::make($password),
				'pin' => Hash::make($pin),
				'code' => $code ? Crypt::encryptString($code) : null,
				'sponsor' => $user->id
			]);

			if ($res)
				return json_encode(['status' => 'success', 'message' => 'account '.$email.' created successfully!']);
			else
				return json_encode(['status' => 'error', 'message' => 'there was an error creating your account, please try again later']);
		} else
			return json_encode($user);
	}



	public function change($api = null, $name = null, $email = null, $password = null, $pin = null, $code = null, $fields = ['id']) {
		
		if ($name) 
			$fields[] = 'name';

		if ($email) 
			$fields [] = 'email';

		if ($password)
			$fields[] = 'password'; 

		if ($pin)
			$fields[] = 'pin';

		if ($code)
			$fields[] = 'code';

		if (in_array('name', $fields))
			$array['name'] = mb_convert_case($name, MB_CASE_TITLE);

		if (in_array('email', $fields))
			$array['email'] = strtolower($email);

		if (in_array('password', $fields))
			$array['password'] = Hash::make($password);

		if (in_array('pin', $fields))
			$array['pin'] = Hash::make($pin);

		if (in_array('code', $fields))
			$array['code'] = Crypt::encryptString($code);

	
		$user = BaseAPI::checkAccount($api, $name, $email, $password, $pin, $fields);

		if (!empty($user->id)) {
			$res = $user->update($array);

			if ($res)
				return json_encode(['status' => 'success', 'message' => 'account '.$user->email.' was updated successfully!']);
			else
				return json_encode(['status' => 'error', 'message' => 'there was an error creating your account, please try again later']);
		} else
			return json_encode($user);
	}


	public function changeName($api = null, $name, $fields = ['id', 'name']) {

		$user = BaseAPI::check($api, $fields);

		if (!empty($user->id)) {

			if ($name and strlen($name) >= 3 and strlen($name) <= 30) {
				$user->name = mb_convert_case($name, MB_CASE_TITLE);
				if ($user->save())
					return json_encode(['status' => 'success', 'message' => 'your name has been changed successfully.']);
				else
					return json_encode(['status' => 'error', 'message' => 'an error occurred while trying to change your name']);
			} else
				return json_encode(['status' => 'error', 'message' => 'your name must be between 3 and 30 characters']);
		} else
			return json_encode($user);

	}


	public function changeEmail($api = null, $email, $fields = ['id', 'password']) {
		$email = strtolower($email);

		$user = BaseAPI::check($api, $fields);

		if (!empty($user->id)) {

			if ($email and strlen($email) >= 10 and strlen($email) <= 60 and filter_var($email, FILTER_VALIDATE_EMAIL)) {

				if ($user->email == $email or !User::Select('id')->Where('email', $email)->first()) {

					$user->email = $email;

					if ($user->save())
						return json_encode(['status' => 'success', 'message' => 'your email has been changed successfully']);
					else
						return json_encode(['status' => 'error', 'message' => 'an error occurred while trying to change your email']);

				} else
					return json_encode(['status' => 'error', 'message' => 'the informed email is already in use']);
			} else
				return json_encode(['status' => 'error', 'message' => 'the email must be valid and have between 10 and 60 characters']);
		} else
			return json_encode($user);

	}


	public function changePassword($api = null, $password, $fields = ['id', 'password']) {

		$user = BaseAPI::check($api, $fields);

		if (!empty($user->id)) {

			if ($password and strlen($password) >= 6 and strlen($password) <= 50) {
				$user->password = Hash::make($password);
				if ($user->save())
					return json_encode(['status' => 'success', 'message' => 'your password has been changed successfully.']);
				else
					return json_encode(['status' => 'error', 'message' => 'an error occurred while trying to change your password']);
			} else
				return json_encode(['status' => 'error', 'message' => 'your password must be between 6 and 50 characters']);
		} else
			return json_encode($user);

	}


	public function changePin($api = null, $pin, $fields = ['id', 'pin']) {

		$user = BaseAPI::check($api, $fields);

		if (!empty($user->id)) {

			if ($pin and strlen($pin) >= 6 and strlen($pin) <= 50) {
				$user->pin = Hash::make($pin);
				if ($user->save())
					return json_encode(['status' => 'success', 'message' => 'your pin has been changed successfully.']);
				else
					return json_encode(['status' => 'error', 'message' => 'an error occurred while trying to change your pin']);
			} else
				return json_encode(['status' => 'error', 'message' => 'your pin must be between 6 and 50 characters']);
		} else
			return json_encode($user);

	}


	public function changeCode($api = null, $code, $fields = ['id', 'code']) {

		$user = BaseAPI::check($api, $fields);

		if (!empty($user->id)) {

			if ($code and strlen($code) >= 6 and strlen($code) <= 20) {
				$user->code = Crypt::encryptString($code);
				if ($user->save())
					return json_encode(['status' => 'success', 'message' => 'your code has been changed successfully.']);
				else
					return json_encode(['status' => 'error', 'message' => 'an error occurred while trying to change your code']);
			} else
				return json_encode(['status' => 'error', 'message' => 'your code must be between 6 and 20 characters']);
		} else
			return json_encode($user);

	}


}