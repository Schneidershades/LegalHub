<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Agent;
use App\Models\PartnersAndDirector;
use App\Models\BodyObjective;
use App\Models\Name;
use App\Models\RegistrationTransaction;

class PatentRegistration extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function($file){
            $file->identifier = 'LH-PATENT'.uniqid(true);
        });
    }

    public function agents()
    {
        return $this->morphMany(Agent::class, 'agentable');
    }

    public function statements()
    {
        return $this->morphMany(BodyObjective::class, 'objectable');
    }

    public function applicants()
    {
        return $this->morphMany(PartnersAndDirector::class, 'directable');
    }

    public function patentNames()
    {
        return $this->morphMany(Name::class, 'nameable');
    }

    public function registrationTransactions()
    {
        return $this->morphMany(RegistrationTransaction::class, 'transactionable');
    }
}
