<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use User;
use DB;
use Hash;


class Api extends Model
{
    protected $fillable = ['user_id', 'api_key', 'code'];


    public static function User($api, $pin, $fields = ['id']) {

    	$fields[] = 'pin';

    	$res = Api::Select('user_id')->Where('api_key', sha1($api))->first();

    	if ($res) {
    		$user = User::Select($fields)->Find($res->user_id);


    		if (Hash::check($pin, $user->pin))
    			return $user;
    	}


	}

}
