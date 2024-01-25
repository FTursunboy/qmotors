<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\User;
use App\Models\UserCar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class OrderNotification extends Notification
{
    use Queueable;

    private $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }


    public function toTelegram($notifiable)
    {
        $cr_model = UserCar::find($this->order->user_car_id);
        $user = User::find($cr_model->user_id);

        return TelegramMessage::create()
            ->content("Новая запись в автосервис
                \n Номер  Заказа: {$this->order->order_number}
                \n Дата: {$this->order->date}
                \n Тип заказа: {$this->order->order_type_relation->name}
                \n Пользователь: {$user->name} {$user->phone_number}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
