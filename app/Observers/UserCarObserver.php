<?php

namespace App\Observers;

use App\Models\UserCar;
use App\Services\OneCService;

class UserCarObserver
{
    /**
     * Handle the UserCar "created" event.
     *
     * @param  \App\Models\UserCar  $userCar
     * @return void
     */
    public function created(UserCar $userCar)
    {
        with(new OneCService)->car($userCar);
    }

    /**
     * Handle the UserCar "updated" event.
     *
     * @param  \App\Models\UserCar  $userCar
     * @return void
     */
    public function updated(UserCar $userCar)
    {
        with(new OneCService)->car($userCar);
    }

    /**
     * Handle the UserCar "deleted" event.
     *
     * @param  \App\Models\UserCar  $userCar
     * @return void
     */
    public function deleted(UserCar $userCar)
    {
        //
    }

    /**
     * Handle the UserCar "restored" event.
     *
     * @param  \App\Models\UserCar  $userCar
     * @return void
     */
    public function restored(UserCar $userCar)
    {
        //
    }

    /**
     * Handle the UserCar "force deleted" event.
     *
     * @param  \App\Models\UserCar  $userCar
     * @return void
     */
    public function forceDeleted(UserCar $userCar)
    {
        //
    }
}
