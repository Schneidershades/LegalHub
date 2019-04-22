<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationItem;

class Service extends Model
{
    public function registrationItems()
    {
    	return $this->hasMany(RegistrationItem::class);
    }
}
