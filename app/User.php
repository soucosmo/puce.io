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

    public function MyAddress($coin) {
        $res = $this->addresses()->Select('address', 'updated_at as created')->Where('coin', $coin)->WhereNull('api')->first();
        if (!$res) {
            $res = Addresses::Select('id', 'user_id')->Where('coin', $coin)->WhereNull('user_id')->first();
            if ($res) {
                $res->user_id = $this->id;
                $res->save();

                $res = $this->addresses()->Select('address', 'updated_at as created')->find($res->id);
            } else {
                $res = (object) ['address' => 'Temporarily unavailable', 'created' => date('Y-m-d h:i:s')];
            }
        }

        return $res;
    }

    public function Address($coin, $url = null) {

        $res = Addresses::Select('id', 'user_id', 'module', 'url')->Where('coin', $coin)->WhereNull('api')->WhereNull('user_id')->first();

        if ($res) {
            $res->api = 1;
            $res->user_id = $this->id;
            $res->module = $res->module;
            $res->url = $url;
            $res->save();

            $res = $this->addresses()->Select('address', 'updated_at as created')->find($res->id);
        }

        return $res;
    }

    public function AddressAll($coin) {
        $array = ['status' => 'success'];
        foreach ($this->addresses()->Select('address', 'url','updated_at as created')->Where('coin', $coin)->WhereNotNull('api')->get() as $data) {
            $array[] = ['address' => $data->address, 'url' => $data->url, 'created' => $data->created];

        }

        if (count($array) > 1)
            return $array;
        else
            return ['status' => 'error', 'message' => 'you do not have any addresses to display'];
    }
}
