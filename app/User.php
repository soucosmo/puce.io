<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Addresses;
use Api;
use Balance;
use Deposit;
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
        'name', 'email', 'password', 'pin', 'code', 'sponsor'
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

    public function deposit() {
        return $this->hasMany(Deposit::class);
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

    public function balances() {
        return $this->hasMany(Balance::class);
    }

    public function MyBalance($coin) {
        return $this->balance()->Select('amount', 'updated_at as updated')->firstOrCreate(['coin' => Code($coin)]);
    }

    public function MyBalances() {
        $array = array();
        $array['status'] = 'success';
        foreach ($this->balances()->Select('amount', 'coin', 'updated_at as updated')->get() as $data) {
            $array[Code($data->coin)] = ['amount' => $data->amount, 'updated' => $data->updated];

        }
        return $array;
    }
}
