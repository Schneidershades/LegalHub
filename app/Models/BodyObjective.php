<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BodyObjective extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function objectable()
    {
        return $this->morphTo();
    }
}
