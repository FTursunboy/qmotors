<?php

namespace App\Observers;

use App\Models\ChatMessages;
use App\Services\OneCService;

class ChatMessageObserver
{
    /**
     * Handle the ChatMessages "created" event.
     *
     * @param \App\Models\ChatMessages $chatMessages
     * @return void
     */
    public function created(ChatMessages $chatMessages)
    {
        with(new OneCService)->chat($chatMessages);
    }

    /**
     * Handle the ChatMessages "updated" event.
     *
     * @param \App\Models\ChatMessages $chatMessages
     * @return void
     */
    public function updated(ChatMessages $chatMessages)
    {
        with(new OneCService)->chat($chatMessages);
    }

    /**
     * Handle the ChatMessages "deleted" event.
     *
     * @param \App\Models\ChatMessages $chatMessages
     * @return void
     */
    public function deleted(ChatMessages $chatMessages)
    {
        //
    }

    /**
     * Handle the ChatMessages "restored" event.
     *
     * @param \App\Models\ChatMessages $chatMessages
     * @return void
     */
    public function restored(ChatMessages $chatMessages)
    {
        //
    }

    /**
     * Handle the ChatMessages "force deleted" event.
     *
     * @param \App\Models\ChatMessages $chatMessages
     * @return void
     */
    public function forceDeleted(ChatMessages $chatMessages)
    {
        //
    }
}
