<?php

namespace App\Services;

use App\Jobs\ProcessPushNotification;
use App\Models\Notification;
use App\Models\User;
use App\Services\Contracts\NotificationServiceInterface;
use Illuminate\Support\Facades\Http;

class NotificationService implements NotificationServiceInterface
{
    public $class;
    public $request;

    public function __construct()
    {
        $this->class = Notification::class;
        $this->request = request();
    }

    public function filter()
    {
        $order = requestOrder();
        return $this->class::where(function ($query) {
            if ($this->request->user != null) {
                $query->whereHas('user', function ($query) {
                    $query->where('surname', 'ilike', '%' . $this->request->user . '%')
                        ->orWhere('name', 'ilike', '%' . $this->request->user . '%')
                        ->orWhere('id', 'ilike', '%' . $this->request->user . '%');
                });
            }
            if ($this->request->title != null) {
                $query->where('title', 'ilike', '%' . $this->request->title . '%');
            }
            if ($this->request->text != null) {
                $query->where('text', 'ilike', '%' . $this->request->text . '%');
            }
            if ($this->request->notification_type != null) {
                $query->where('notification_type', 'ilike', '%' . $this->request->notification_type . '%');
            }
            if ($this->request->additional_id != null) {
                $query->where('additional_id', 'ilike', '%' . $this->request->additional_id . '%');
            }
            if ($this->request->created_at_start != null) {
                $query->whereDate('created_at', '>=', $this->request->created_at_start);
            }
            if ($this->request->created_at_end != null) {
                $query->whereDate('created_at', '<=', $this->request->created_at_end);
            }
            if ($this->request->updated_at_start != null) {
                $query->whereDate('updated_at', '>=', $this->request->updated_at_start);
            }
            if ($this->request->updated_at_end != null) {
                $query->whereDate('updated_at', '<=', $this->request->updated_at_end);
            }
        })
            ->orderBy($order['key'], $order['value'])
            ->paginate($this->request->get('per_page', 20));
    }

    public function store($request)
    {
        $model = $this->class::create(array_merge(
            $request->only('user_id', 'title', 'text'),
            [
                'id' => $this->class::nextID()
            ]
        ));

        PushNotificationService::send($request, $model, ['title' => 'Новое уведомление', 'body' => $request->title]);

        return $model;
    }

    public function update($id, $request)
    {
        $model = $this->class::findOrFail($id);
        $model->update($request->only('user_id', 'title', 'text', 'notification_type', 'additional_id'));
        // PushNotificationService::send($request, $model);
        return $model;
    }
}
