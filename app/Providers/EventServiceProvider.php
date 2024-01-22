<?php

namespace App\Providers;

use App\Models\Bonus;
use App\Models\ChatMessages;
use App\Models\FirebaseLog;
use App\Models\Order;
use App\Models\OrderPhoto;
use App\Models\User;
use App\Models\UserCar;

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

}
