<?php

namespace App\Observers;

use App\Models\FirebaseLog;
use App\Services\OneCService;

class FirebaseLogObserver
{
    /**
     * Handle the FirebaseLog "created" event.
     *
     * @param \App\Models\FirebaseLog $firebaseLog
     * @return void
     */
    public function created(FirebaseLog $firebaseLog)
    {
        with(new OneCService)->push($firebaseLog);
    }

    /**
     * Handle the FirebaseLog "updated" event.
     *
     * @param \App\Models\FirebaseLog $firebaseLog
     * @return void
     */
    public function updated(FirebaseLog $firebaseLog)
    {
        with(new OneCService)->push($firebaseLog);
    }

    /**
     * Handle the FirebaseLog "deleted" event.
     *
     * @param \App\Models\FirebaseLog $firebaseLog
     * @return void
     */
    public function deleted(FirebaseLog $firebaseLog)
    {
        //
    }

    /**
     * Handle the FirebaseLog "restored" event.
     *
     * @param \App\Models\FirebaseLog $firebaseLog
     * @return void
     */
    public function restored(FirebaseLog $firebaseLog)
    {
        //
    }

    /**
     * Handle the FirebaseLog "force deleted" event.
     *
     * @param \App\Models\FirebaseLog $firebaseLog
     * @return void
     */
    public function forceDeleted(FirebaseLog $firebaseLog)
    {
        //
    }
}
