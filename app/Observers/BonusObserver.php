<?php

namespace App\Observers;

use App\Models\Bonus;
use App\Services\OneCService;

class BonusObserver
{
    /**
     * Handle the Bonus "created" event.
     *
     * @param Bonus $bonus
     * @return void
     */
    public function created(Bonus $bonus)
    {
        with(new OneCService)->bonus($bonus);

    }

    /**
     * Handle the Bonus "updated" event.
     *
     * @param Bonus $bonus
     * @return void
     */
    public function updated(Bonus $bonus)
    {
        with(new OneCService)->bonus($bonus);
    }

    /**
     * Handle the Bonus "deleted" event.
     *
     * @param Bonus $bonus
     * @return void
     */
    public function deleted(Bonus $bonus)
    {
        with(new OneCService)->send([
            'type' => 'bonus',
            'bonus_id' => $bonus->id,
            'delete' => true
        ]);

    }

    /**
     * Handle the Bonus "restored" event.
     *
     * @param Bonus $bonus
     * @return void
     */
    public function restored(Bonus $bonus)
    {
        //
    }

    /**
     * Handle the Bonus "force deleted" event.
     *
     * @param Bonus $bonus
     * @return void
     */
    public function forceDeleted(Bonus $bonus)
    {
        //
    }
}
