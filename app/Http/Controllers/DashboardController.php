<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Auth;

class DashboardController extends Controller
{
	private $minutes = 1;

    public function index($coin = 'btc') {
    	$coin = strtolower($coin);

		$this->getAltcoins($coin);    		


    	return view('dashboard.index', [
    		'title' => __('dashboard.title'),
    		'coin' => Cache::get('altcoin_'.$coin),
    		'altcoins' => Cache::get('altcoins'),
    		'balance' => Auth::User()->MyBalance($coin),
    		'receive' => Auth::User()->MyAddress($coin),
 			'addresses' => Auth::User()->addresses()->Where('coin', Code($coin))->OrderByDesc('id')->paginate(6),
 			'extract' => Auth::User()->extract()->Where('coin', Code($coin))->OrderByDesc('id')->paginate(6),
 			'deposits' => Auth::User()->deposit()->Where('coin', Code($coin))->OrderByDesc('id')->paginate(6),
 			'withdrawals' => Auth::User()->withdrawal()->Where('coin', Code($coin))->OrderByDesc('id')->paginate(6)
    	]);
    }

    public function getAltcoins($coin) {
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
    }
}
