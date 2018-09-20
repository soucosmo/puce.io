<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = ['id_api', 'coin', 'address', 'payment_id', 'tx_id', 'amount', 'fee', 'fee_api', 'url', 'status', 'module'];

    
}
