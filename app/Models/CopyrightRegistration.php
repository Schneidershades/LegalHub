<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopyrightRegistration extends Model
{
	protected static function boot()
    {
        parent::boot();

        static::creating(function($file){
            $file->identifier = 'LH-COPYRIGHTS'.uniqid(true);
        });
    }
    
    public function agents()
    {
        return $this->morphMany(PartnersAndDirector::class, 'directable');
    }

    public function registrationTransactions()
    {
        return $this->morphMany(RegistrationTransaction::class, 'transactionable');
    }

}
