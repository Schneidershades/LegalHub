<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BusinessRegistration;
use App\Models\CompanyRegistration;
use App\Models\TpcRegistration;
use App\Models\RegistrationItem;

class RegistrationTransaction extends Model
{
    protected $fillable = [
        'status',
        'amount',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function registrationItem()
    {
        return $this->belongsTo(RegistrationItem::class);
    }

    public function businessNameRegistrations()
    {
        return $this->hasMany(BusinessRegistration::class);
    }

    public function companyRegistrations()
    {
        return $this->hasMany(CompanyRegistrations::class);
    }

    public function trademarkRegistrations()
    {
        return $this->hasMany(TrademarkRegistrations::class);
    }

    public function copyrightRegistrations()
    {
        return $this->hasMany(CopyrightRegistrations::class);
    }

    public function patentRegistrations()
    {
        return $this->hasMany(PatentRegistrations::class);
    }

    public function transactionable()
    {
        return $this->morphTo();
    }

}
