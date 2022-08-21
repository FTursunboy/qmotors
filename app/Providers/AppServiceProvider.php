<?php

namespace App\Providers;

use App\Services\BonusService;
use App\Services\CarService;
use App\Services\Contracts\BonusServiceInterface;
use App\Services\Contracts\CarServiceInterface;
use App\Services\Contracts\NotificationServiceInterface;
use App\Services\OrderService;
use App\Services\Contracts\OrderServiceInterface;
use App\Services\Contracts\ReminderServiceInterface;
use App\Services\Contracts\ReviewServiceInterface;
use App\Services\Contracts\SmsServiceInterface;
use App\Services\Contracts\StockServiceInterface;
use App\Services\Contracts\TechCenterServiceInterface;
use App\Services\Contracts\UserCarServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\NotificationService;
use App\Services\ReminderService;
use App\Services\ReviewService;
use App\Services\SmsService;
use App\Services\StockService;
use App\Services\TechCenterService;
use App\Services\UserCarService;
use App\Services\UserService;
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
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(TechCenterServiceInterface::class, TechCenterService::class);
        $this->app->bind(ReminderServiceInterface::class, ReminderService::class);
        $this->app->bind(BonusServiceInterface::class, BonusService::class);
        $this->app->bind(NotificationServiceInterface::class, NotificationService::class);
        $this->app->bind(ReviewServiceInterface::class, ReviewService::class);
        $this->app->bind(StockServiceInterface::class, StockService::class);
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
