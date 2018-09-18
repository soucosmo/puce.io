<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Crypt;
use User;

class Api extends Model
{
    protected $fillable = ['user_id', 'key'];


    public static function User($api, $fields = ['id']) {
		foreach (Api::Select('user_id', 'key')->get() as $data) {
			if ($api === Crypt::decryptString($data['key']))

				return User::Select($fields)->Find($data['user_id']);	
			
		}

	}

}
