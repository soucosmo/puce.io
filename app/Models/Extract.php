<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extract extends Model
{
    protected $fillable = ['user_id', 'type', 'reason', 'coin', 'before', 'amount', 'after'];
}
