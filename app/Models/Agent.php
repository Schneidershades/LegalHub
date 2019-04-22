<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TrademarkRegistration;

class Agent extends Model
{
    public function trademarkRegistration()
    {
    	return $this->belongsTo(TrademarkRegistration::class);
    }

    public function agentable()
    {
        return $this->morphTo();
    }
}
