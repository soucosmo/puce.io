<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = ['coin', 'address', 'payment_id', 'tx_id', 'amount', 'fee', 'fee_api', 'status', 'module'];

    public function bitsahani() {
    	
    }
}
