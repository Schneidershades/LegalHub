<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class RoleDiscount extends Model
{
    public function role()
    {
    	return $this->belongsTo(Role::class);
    }

    public function item()
    {
    	return $this->belongsTo(Item::class);
    }
}
