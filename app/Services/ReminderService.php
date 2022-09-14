<?php

namespace App\Services;

use App\Jobs\ProcessPushNotification;
use App\Models\Reminder;
use App\Services\Contracts\ReminderServiceInterface;

class ReminderService implements ReminderServiceInterface
{
  private $class;
  private $request;

  public function __construct()
  {
    $this->class = Reminder::class;
    $this->request = request();
  }

  public function filter()
  {
    $order = requestOrder();
    return $this->class::where(function ($query) {
      if ($this->request->model_id != null) {
        $query->whereHas('user_car', function ($query) {
          $query->where('car_model_id', $this->request->model_id);
        });
      }
      if ($this->request->text != null) {
        $query->where('text', 'ilike', '%' . $this->request->text . '%');
      }
      if ($this->request->date_start != null) {
        $query->whereDate('date', '>=', $this->request->date_start);
      }
      if ($this->request->date_end != null) {
        $query->whereDate('date', '<=', $this->request->date_end);
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
      ->paginate(request()->get('per_page', 20));
  }

  public function store($request)
  {
    $model = $this->class::create(array_merge($request->only(
      'user_car_id',
      'date',
      'text'
    ), [
      'id' => $this->class::nextID()
    ]));
    ProcessPushNotification::dispatch($request->collect(), $model);
    return $model;
  }

  public function update($id, $request)
  {
    $model = Reminder::findOrFail($id);
    $model->update($request->only(
      'user_car_id',
      'date',
      'text'
    ));
    return $model;
  }
}
