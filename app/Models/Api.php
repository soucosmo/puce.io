<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use User;
use DB;
use Hash;
use Cache;


class Api extends Model
{
    protected $fillable = ['user_id', 'api_key', 'code'];

    private $minutes = 120;

    public static function User($api, $pin, $fields = ['id']) {

        if (!Cache::has('api_user'.$api.$pin)) {
            global $minutes;
            $fields[] = 'pin';

            $res = Api::Select('user_id')->Where('api_key', sha1($api))->first();

            if ($res) {
                $user = User::Select($fields)->Find($res->user_id);

                if (Hash::check($pin, $user->pin))
                    Cache::put('api_user'.$api.$pin, $user, 120);
            }
        
        }

        if (Cache::has('api_user'.$api.$pin))
            return Cache::get('api_user'.$api.$pin);

	}


}
