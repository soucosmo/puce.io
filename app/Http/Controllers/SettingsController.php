<?php

namespace App\Http\Controllers;


use App\Http\Requests\Settings\GenerateKey;
use App\Http\Requests\Settings\Google;
use App\Http\Requests\Settings\Password;
use App\Http\Requests\Settings\Pin;
use App\Http\Requests\Settings\Profile;
use Auth;
use Cache;
use Crypt;
use Hash;
use Response;


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

        if (Hash::check($data->password_current, Auth::User()->password))
            if ( Auth::User()->Update(['password' => Hash::make($data->password)]) )
                return Response::Json(['success' => __('settings.password_changed')]);
        else
            return Response::Json(['error' => __('settings.current_invalid')]);

        return Response::Json(['error' => __('settings.password_error')]);
    }


    public function pin(Pin $data) {

    }


    public function email(Email $data) {

    }
}
