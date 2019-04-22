<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PartnersAndDirector;
use App\Models\RegistrationTransaction;
use App\Models\Name;

class NgoRegistration extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function($file){
            $file->identifier = 'LH-NGO'.uniqid(true);
        });
    }

    public function trustees()
    {
        return $this->morphMany(PartnersAndDirector::class, 'directable');
    }

    public function ngoNames()
    {
        return $this->morphMany(Name::class, 'nameable');
    }

    public function registrationTransactions()
    {
        return $this->morphMany(RegistrationTransaction::class, 'transactionable');
    }

}
