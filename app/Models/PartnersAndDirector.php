<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\Shareholding;
use App\Model\User;

class PartnersAndDirector extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function objectable()
    {
        return $this->morphTo();
    }

    public function directable()
    {
        return $this->morphTo();
    }

    // public function partnersAndDirectors()
    // {
    //     return $this->morphMany(Shareholding::class, 'sharable');
    // }

    // public function uploads()
    // {
    //     return $this->morphMany(Upload::class, 'uploadable');
    // }
}
