<?php
namespace App\Http\Controllers\Api\Response;
ob_start('ob_gzhandler');


use User;
use Hash;
use Crypt;
use Response;


class AccountAPI extends \Controller {
	public function create($api = '', $pin_key = '', $name = '', $email = '', $password = '', $pin = '') {
		$email = strtolower($email);

		$user = BaseAPI::checkAccount($api, $pin_key, $name, $email, $password, $pin);
		
		if (!empty($user->id)) {
			$res = User::create([
				'name' => mb_convert_case($name, MB_CASE_TITLE),
				'email' => $email,
				'password' => Hash::make($password),
				'pin' => Hash::make($pin),
				'sponsor' => $user->id
			]);

			if ($res)
				return Response::Json(['status' => 'success', 'message' => 'account '.$email.' created successfully!']);
			else
				return Response::Json(['status' => 'error', 'message' => 'there was an error creating your account, please try again later']);
		} else
			return Response::Json($user);
	}



	public function change($api = '', $pin_key = '', $name = '', $email = '', $password = '', $pin = '', $fields = ['id']) {

		if ($name) 
			$fields[] = 'name';

		if ($email) 
			$fields[] = 'email';

		if ($password)
			$fields[] = 'password'; 

		if ($pin)
			$fields[] = 'pin';


		if (in_array('name', $fields))
			$array['name'] = mb_convert_case($name, MB_CASE_TITLE);

		if (in_array('email', $fields))
			$array['email'] = strtolower($email);

		if (in_array('password', $fields))
			$array['password'] = Hash::make($password);

		if (in_array('pin', $fields))
			$array['pin'] = Hash::make($pin);

	
		$user = BaseAPI::checkAccount($api, $pin_key, $name, $email, $password, $pin, $fields);

		if (!empty($user->id)) {
			$res = $user->update($array);

			if ($res)
				return Response::Json(['status' => 'success', 'message' => 'account '.$user->email.' was updated successfully!']);
			else
				return Response::Json(['status' => 'error', 'message' => 'there was an error creating your account, please try again later']);
		} else
			return Response::Json($user);
	}


	public function changeName($api = '', $pin_key = '', $name = '', $fields = ['id', 'name', 'pin']) {

		$user = BaseAPI::check($api, $pin_key, $fields);

		if (!empty($user->id)) {

			if ($name and strlen($name) >= 3 and strlen($name) <= 30) {
				$user->name = mb_convert_case($name, MB_CASE_TITLE);
				if ($user->save())
					return Response::Json(['status' => 'success', 'message' => 'your name has been changed successfully.']);
				else
					return Response::Json(['status' => 'error', 'message' => 'an error occurred while trying to change your name']);
			} else
				return Response::Json(['status' => 'error', 'message' => 'your name must be between 3 and 30 characters']);
		} else
			return Response::Json($user);

	}


	public function changeEmail($api = '', $email = '', $fields = ['id', 'password', 'pin']) {
		$email = strtolower($email);

		$user = BaseAPI::check($api, $pin_key, $fields);

		if (!empty($user->id)) {

			if ($email and strlen($email) >= 10 and strlen($email) <= 60 and filter_var($email, FILTER_VALIDATE_EMAIL)) {

				if ($user->email == $email or !User::Select('id')->Where('email', $email)->first()) {

					$user->email = $email;

					if ($user->save())
						return Response::Json(['status' => 'success', 'message' => 'your email has been changed successfully']);
					else
						return Response::Json(['status' => 'error', 'message' => 'an error occurred while trying to change your email']);

				} else
					return Response::Json(['status' => 'error', 'message' => 'the informed email is already in use']);
			} else
				return Response::Json(['status' => 'error', 'message' => 'the email must be valid and have between 10 and 60 characters']);
		} else
			return Response::Json($user);

	}


	public function changePassword($api = '', $pin_key = '', $password = '', $fields = ['id', 'password', 'pin']) {

		$user = BaseAPI::check($api, $pin_key, $fields);

		if (!empty($user->id)) {

			if ($password and strlen($password) >= 6 and strlen($password) <= 50) {
				$user->password = Hash::make($password);
				if ($user->save())
					return Response::Json(['status' => 'success', 'message' => 'your password has been changed successfully.']);
				else
					return Response::Json(['status' => 'error', 'message' => 'an error occurred while trying to change your password']);
			} else
				return Response::Json(['status' => 'error', 'message' => 'your password must be between 6 and 50 characters']);
		} else
			return Response::Json($user);

	}


	public function changePin($api = '', $pin_key = '', $pin = '', $fields = ['id', 'pin']) {

		$user = BaseAPI::check($api, $pin_key, $fields);

		if (!empty($user->id)) {

			if ($pin and strlen($pin) >= 6 and strlen($pin) <= 50) {
				$user->pin = Hash::make($pin);
				if ($user->save())
					return Response::Json(['status' => 'success', 'message' => 'your pin has been changed successfully.']);
				else
					return Response::Json(['status' => 'error', 'message' => 'an error occurred while trying to change your pin']);
			} else
				return Response::Json(['status' => 'error', 'message' => 'your pin must be between 6 and 50 characters']);
		} else
			return Response::Json($user);

	}



}