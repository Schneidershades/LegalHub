<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;

class UserSpecialDiscount extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function item()
    {
    	return $this->belongsTo(Item::class);
    }
}
