<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extract extends Model
{
    protected $fillable = ['user_id', 'operation_id', 'type', 'action', 'description', 'coin', 'before', 'amount', 'after'];
}
