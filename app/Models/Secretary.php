<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyRegistration;

class Secretary extends Model
{
    public function companyRegistration()
    {
    	return $this->belongsTo(CompanyRegistration::class);
    }
}
