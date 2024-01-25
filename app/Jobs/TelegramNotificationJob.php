<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\TechCenter;
use App\Models\TechCenterNickName;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\Telegram\Chat;
use App\Services\OrderService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class TelegramNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;
    public $nickname;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(TechCenterNickName $nickname, Order $order)
    {
        $this->nickname = $nickname;
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::send($this->nickname, new OrderNotification($this->order));
    }
}
