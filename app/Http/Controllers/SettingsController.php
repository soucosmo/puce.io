<?php

namespace App\Http\Controllers;


use App\Http\Requests\Settings\GenerateKey;
use App\Http\Requests\Settings\Google;
use App\Http\Requests\Settings\password;
use App\Http\Requests\Settings\pin;
use App\Http\Requests\Settings\profile;
use Auth;
use Cache;
use Crypt;

class SettingsController extends Controller
{
	private $minutes = 120;

    public function index() {

        if ( !Cache::has('altcoins') ) {
            $coins = [];
            foreach (Altcoins() as $data) {

                $coins[$data['coin']] = [
                    'coin' => $data['coin'],
                    'name' => $data['name'],
                    'site' => $data['site'],
                    'fees' => [
                        'deposit' => floatval($data['fees']['deposit']),
                        'withdrawal' => floatval($data['fees']['withdrawal']),
                    ]

                ]; 
            }

            Cache::put('altcoins', $coins, $this->minutes);

        }

    	return view('settings.index', [
            'title' => __('settings.title'),
            'altcoins' => Cache::get('altcoins')
        ]);
    }


    public function GenerateKey(GenerateKey $data) {
    	
    	if (!Cache::has('api_key_'.Auth::id())) {
    		$key = Auth::User()->apis()->first();

	    	if (!$key) {
	    		$res = Auth::User()->apis()->create([
	    			'api_key' => sha1(time().time()),
	    			'code' => $data ? Crypt::encryptString($data->code) : null
	    		]);
	    	} else {
	    		$res = Auth::User()->apis()->update([
	    			'api_key' => sha1(time().time()),
	    			'code' => $data ? Crypt::encryptString($data->code) : null
	    		]);
	    	}

	    	Cache::put('api_key_'.Auth::id(), strtoupper( sha1($res->api_key) ), $this->minutes);

	    }
	    

    }


    public function enableGoogle(Google $data) {

    }


    public function disableGoogle(Google $data) {

    }


    public function password(Password $data) {

    }


    public function pin(Pin $data) {

    }


    public function profile(Profile $data) {

    }


}
