<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;


class DashboardController extends Controller
{
	private $minutes = 120;

    public function index($coin = 'btc') {
    	$coin = strtolower($coin);

    	if ( !Cache::has('altcoin_'.$coin) ) {
    		$coinx = Altcoin($coin);
    		unset($coinx['id'], $coinx['module'], $coinx['fees']['withdrawal_api'], $coinx['fees']['deposit_api'], $coinx['rpc']);
    		Cache::put('altcoin_'.$coin, $coinx, $this->minutes);
    	}


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


    	return view('dashboard.index', [
    		'title' => __('dashboard.title'),
    		'coin' => Cache::get('altcoin_'.$coin),
    		'altcoins' => Cache::get('altcoins')
    	]);
    }
}
