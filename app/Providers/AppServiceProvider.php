<?php

namespace App\Providers;

use App\Services\CarService;
use App\Services\Contracts\CarServiceInterface;
use App\Services\Contracts\SmsServiceInterface;
use App\Services\Contracts\UserCarServiceInterface;
use App\Services\SmsService;
use App\Services\UserCarService;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(UserCarServiceInterface::class, UserCarService::class);
        $this->app->bind(SmsServiceInterface::class, SmsService::class);
        $this->app->bind(CarServiceInterface::class, CarService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
