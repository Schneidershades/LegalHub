<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationItem;
use App\Models\UserSpecialDiscount;
use App\Models\RoleDiscount;

class Item extends Model
{
    public function registrationItems()
    {
        return $this->hasMany(RegistrationItem::class);
    }

    public function discounts()
    {
    	return $this->hasMany(UserSpecialDiscount::class);
    }

    public function roleDiscounts()
    {
    	return $this->hasMany(RoleDiscount::class);
    }
}
