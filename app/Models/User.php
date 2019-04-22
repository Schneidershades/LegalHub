<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\RegistrationTransaction;
use App\Models\RegistrationItem;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function registrationTransactions()
    {
        return $this->hasMany(RegistrationTransaction::class);
    }

    public function registrationItems()
    {
        return $this->hasMany(RegistrationItem::class);
    }

    public function discounts()
    {
        return $this->hasMany(UserSpecialDiscount::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
