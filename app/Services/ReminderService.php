<?php

namespace App\Services;

use App\Models\Reminder;
use App\Services\Contracts\ReminderServiceInterface;

class ReminderService implements ReminderServiceInterface
{
  private $class;

  public function __construct()
  {
    $this->class = Reminder::class;
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
