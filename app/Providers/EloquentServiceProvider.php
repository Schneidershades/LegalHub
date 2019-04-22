<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\BodyObjective;
use App\Models\RegistrationItem;
use App\Models\Name;
use App\Models\PartnersAndDirector;
use App\Models\Shareholding;
use App\Models\BusinessRegistration;
use App\Models\CopyrightRegistration;
use App\Models\CompanyRegistration;
use App\Models\TrademarkRegistration;
use App\Models\PatentRegistration;
use App\Models\Item;
use App\Models\NgoRegistration;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Relation::morphMap([
            'bodyObjective' => BodyObjective::class,
            'registrationItems' => RegistrationItem::class,
            'name' => Name::class,
            'partnersAndDirector' => PartnersAndDirector::class,
            'shareholding' => Shareholding::class,
            'Business' => BusinessRegistration::class,
            'Patent' => PatentRegistration::class,
            'Copyright' => CopyrightRegistration::class,
            'Trademark' => TrademarkRegistration::class,
            'Company' => CompanyRegistration::class,
            'NGO' => NgoRegistration::class,
            'Item' => Item::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
