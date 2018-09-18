<?php

namespace App\Models;


class Addresses extends \Eloquent
{
    protected $fillable = [
    	'api', 'coin', 'address', 'payment_id', 'url', 'module', 'user_id'
    ];
}
