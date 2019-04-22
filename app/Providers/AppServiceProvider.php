<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Partner;
use App\Models\RegistrationTransaction;
use App\Models\UserSpecialDiscount;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('setting', Setting::first());
        View::share('partners', Partner::all());


        $stats = RegistrationTransaction::where('status', 'Paid')->sum('amount');
        View::share('user_has_paid', $stats);

        $discount = UserSpecialDiscount::where('user_discount_id', Auth::id())->count();
        View::share('user_has_discount', $discount);
    }
}
