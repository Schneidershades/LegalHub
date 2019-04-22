<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PartnersAndDirector;
use App\Models\BodyObjective;
use App\Models\Agent;
use App\Models\Item;

class TrademarkRegistration extends Model
{
	protected static function boot()
    {
        parent::boot();

        static::creating(function($file){
            $file->identifier = 'LH-TRADE'.uniqid(true);
        });
    }

    public function registrationTransactions()
    {
        return $this->morphMany(RegistrationTransaction::class, 'transactionable');
    }

    public function objectives()
    {
        return $this->morphMany(BodyObjective::class, 'objectable');
    }

    public function proprietors()
    {
        return $this->morphMany(PartnersAndDirector::class, 'directable');
    }

    public function agents()
    {
        return $this->morphMany(Agent::class, 'agentable');
    }
}
