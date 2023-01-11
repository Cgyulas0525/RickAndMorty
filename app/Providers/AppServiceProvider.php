<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Gate;
use Auth;

use App\Classes\FinanceClass;
use App\Classes\FinancePeriodClass;
use App\Http\Controllers\DashboardController;
use App\Classes\ClosuresClass;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('FinanceClass', FinanceClass::class);
            $loader->alias('FinancePeriodClass', FinancePeriodClass::class);
            $loader->alias('ClosuresClass', ClosuresClass::class);
            $loader->alias('DashboardController', DashboardController::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}