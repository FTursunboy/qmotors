<?php

namespace App\Jobs;

use App\Services\PushNotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPushNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $request;
    public $model;
    public $notification;
    public $user_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, $model, $notification = [], $user_id = null)
    {
        $this->request = $request;
        $this->model = $model;
        $this->notification = $notification;
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        PushNotificationService::send($this->request, $this->model, $this->notification, $this->user_id);
    }
}
