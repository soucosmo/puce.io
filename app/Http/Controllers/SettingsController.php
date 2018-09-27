<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Settings\GenerateKey;


class SettingsController extends Controller
{
    public function index() {
    	return view('settings.index');
    }


    public function GenerateKey(GenerateKey $data) {
    	
    }
}
