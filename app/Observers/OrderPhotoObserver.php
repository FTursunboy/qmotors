<?php

namespace App\Observers;

use App\Models\OrderPhoto;
use App\Services\OneCService;

class OrderPhotoObserver
{
    /**
     * Handle the OrderPhoto "created" event.
     *
     * @param \App\Models\OrderPhoto $orderPhoto
     * @return void
     */
    public function created(OrderPhoto $orderPhoto)
    {
        with(new OneCService())->order($orderPhoto->order);
    }

    /**
     * Handle the OrderPhoto "updated" event.
     *
     * @param \App\Models\OrderPhoto $orderPhoto
     * @return void
     */
    public function updated(OrderPhoto $orderPhoto)
    {
        with(new OneCService())->order($orderPhoto->order);
    }

    /**
     * Handle the OrderPhoto "deleted" event.
     *
     * @param \App\Models\OrderPhoto $orderPhoto
     * @return void
     */
    public function deleted(OrderPhoto $orderPhoto)
    {
        with(new OneCService())->order($orderPhoto->order);
    }

    /**
     * Handle the OrderPhoto "restored" event.
     *
     * @param \App\Models\OrderPhoto $orderPhoto
     * @return void
     */
    public function restored(OrderPhoto $orderPhoto)
    {
        //
    }

    /**
     * Handle the OrderPhoto "force deleted" event.
     *
     * @param \App\Models\OrderPhoto $orderPhoto
     * @return void
     */
    public function forceDeleted(OrderPhoto $orderPhoto)
    {
        //
    }
}
