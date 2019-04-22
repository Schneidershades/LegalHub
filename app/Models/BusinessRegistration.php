<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationTransaction;
use App\Models\BusinessBodyObjectives;
use App\Models\Name;
use App\Models\BodyObjectives;
use App\Models\PartnersAndDirector;
use App\Models\Upload;
use App\Models\RegistrationItem;


class BusinessRegistration extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function($file){
            $file->identifier = 'LH-BIZ'.uniqid(true);
        });
    }

    public function registrationTransactions()
    {
        return $this->morphMany(RegistrationTransaction::class, 'transactionable');
    }

    public function businessNames()
    {
        return $this->morphMany(Name::class, 'nameable');
    }

    public function bodyObjectives()
    {
        return $this->morphMany(BodyObjective::class, 'objectable');
    }

    public function partnersAndDirectors()
    {
        return $this->morphMany(PartnersAndDirector::class, 'directable');
    }

    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    // public function registrationItems()
    // {
    //     return $this->morphMany(RegistrationItem::class, 'itemable');
    // }
}
