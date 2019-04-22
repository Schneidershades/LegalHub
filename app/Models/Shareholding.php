<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CompanyRegistration;

class Shareholding extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shareholding()
    {
        return $this->belongsTo(CompanyRegistration::class, 'company_registration_id');
    }

}
