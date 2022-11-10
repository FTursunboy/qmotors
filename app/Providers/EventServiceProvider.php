<?php

namespace App\Providers;

use App\Models\Bonus;
use App\Models\ChatMessages;
use App\Models\FirebaseLog;
use App\Models\Order;
use App\Models\OrderPhoto;
use App\Models\User;
use App\Models\UserCar;
use App\Observers\BonusObserver;
use App\Observers\ChatMessageObserver;
use App\Observers\FirebaseLogObserver;
use App\Observers\OrderObserver;
use App\Observers\OrderPhotoObserver;
use App\Observers\UserCarObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        UserCar::observe(UserCarObserver::class);
        ChatMessages::observe(ChatMessageObserver::class);
        Bonus::observe(BonusObserver::class);
        Order::observe(OrderObserver::class);
        OrderPhoto::observe(OrderPhotoObserver::class);
        FirebaseLog::observe(FirebaseLogObserver::class);
    }
}
