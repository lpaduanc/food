<?php

namespace App\Providers;

use App\Models\Plano;
use App\Observers\PlanoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plano::observe(PlanoObserver::class);
    }
}
