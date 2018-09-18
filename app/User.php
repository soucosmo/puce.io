<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Addresses;
use Api;
use Balance;
use Deposits;
use Extract;
use Login;
use Nonce;
use Withdrawal;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'pin', 'code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'pin', 'remember_token',
    ];

    public function addresses() {
        return $this->hasMany(Addresses::class);
    }

    public function api() {
        return $this->hasOne(Api::class);
    }

    public function balance() {
        return $this->hasMany(Balance::class);
    }

    public function extract() {
        return $this->hasMany(Extract::class);
    }

    public function login() {
        return $this->hasMany(Login::class);
    }

    public function withdrawal() {
        return $this->hasMany(Withdrawal::class);
    }
}
