<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationTransaction;
use App\Models\Item;
use App\Models\User;

class RegistrationItem extends Model
{
    public function item()
    {
    	return $this->belongsTo(Item::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
