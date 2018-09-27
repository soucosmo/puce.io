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
use Cache;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'pin', 'sponsor'
    ];

    private $minutes = 5;

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


        if (!Cache::has('my_balance_'.$coin.$this->id)) {
            Cache::put('my_balance_'.$coin.$this->id,
                $this->balance()->Select('amount', 'updated_at as updated')
                ->firstOrCreate(['coin' => Code($coin)]), $this->minutes);
        }

        return Cache::get('my_balance_'.$coin.$this->id);

    }

    public function MyBalances() {

        if (!Cache::has('my_balances_'.$this->id)) {
            $array = array();
            $array['status'] = 'success';
            foreach ($this->balances()->Select('amount', 'coin', 'updated_at as updated')->get() as $data) {
                $array['data'][Code($data->coin)] = ['amount' => $data->amount, 'updated' => $data->updated];

            }

            Cache::put('my_balances_'.$this->id, $array, $this->minutes);

        }

        
        return Cache::get('my_balances_'.$this->id);
    }

    public function MyAddress($coin) {

        if(!Cache::has('my_address_'.$coin.$this->id)) {
            $res = $this->addresses()->Select('address', 'payment_id', 'updated_at as created')->Where('coin', $coin)->WhereNull('api')->first();
            if (!$res) {
                $res = Addresses::Select('id', 'user_id')->Where('coin', $coin)->WhereNull('user_id')->first();
                if ($res) {
                    $res->user_id = $this->id;
                    $res->save();

                    $res = $this->addresses()->Select('address', 'payment_id', 'updated_at as created')->find($res->id);
                } else {
                    $res = (object) ['address' => 'temporarily unavailable', 'payment_id' => null, 'created' => date('Y-m-d h:i:s')];
                }
            }

            Cache::put('my_address_'.$coin.$this->id, $res, $this->minutes);
        }

        return Cache::get('my_address_'.$coin.$this->id);
    }

    public function Address($coin, $url = null) {

        $res = Addresses::Select('id', 'user_id', 'module', 'url')->Where('coin', $coin)->WhereNull('api')->WhereNull('user_id')->first();

        if ($res) {
            $res->api = 1;
            $res->user_id = $this->id;
            $res->module = $res->module;
            $res->url = $url;
            $res->save();

            $res = $this->addresses()->Select('address', 'payment_id', 'updated_at as created')->find($res->id);
        }

        return $res;
    }

    public function AddressAll($coin) {

        if (!Cache::has('address_all_'.$coin.$this->id)) {
            $array = ['status' => 'success'];
            foreach ($this->addresses()->Select('address', 'payment_id', 'url','updated_at as created')->Where('coin', $coin)->WhereNotNull('api')->get() as $data) {
                $arrayLoop['data']['address'] = $data->address;

                if (!empty($data['payment_id']))
                    $arrayLoop['data']['payment_id'] = $data['payment_id'];
                
                $arrayLoop['data']['url'] = $data->url;
                $arrayLoop['data']['created'] = $data->created;

                $array[] = $arrayLoop;
                unset($arrayLoop);

            }

            if (count($array) > 1)
                return $array;
            else
                $array = ['status' => 'error', 'message' => 'you do not have any addresses to display'];
            Cache::put('address_all_'.$coin.$this->id, $array, $this->minutes);
        }

        return Cache::get('address_all_'.$coin.$this->id);
    }
}
