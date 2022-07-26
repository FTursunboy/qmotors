<?php

namespace App\Services;

use App\Models\TechCenter;
use App\Services\Contracts\TechCenterServiceInterface;
use Throwable;

class TechCenterService implements TechCenterServiceInterface
{
  public $class;
  public $request;

  public function __construct($class = null, $request = null)
  {
    if ($request == null) {
      $this->request = request();
    } else {
      $this->request = $request;
    }
    if ($class == null) {
      $this->class = TechCenter::class;
    } else {
      $this->class = $class;
    }
  }

  public function filter()
  {
    $order = requestOrder();
    return $this->class::where(function ($query) {
      if ($this->request->title != null) {
        $query->where('title', 'ilike', '%' . $this->request->title . '%');
      }
      if ($this->request->phone != null) {
        $query->where('phone', 'ilike', '%' . $this->request->phone . '%');
      }
      if ($this->request->address != null) {
        $query->where('address', 'ilike', '%' . $this->request->address . '%');
      }
      if ($this->request->url != null) {
        $query->where('url', 'ilike', '%' . $this->request->url . '%');
      }
      if ($this->request->lat != null) {
        $query->where('lat', 'ilike', '%' . $this->request->lat . '%');
      }
      if ($this->request->lng != null) {
        $query->where('lng', 'ilike', '%' . $this->request->lng . '%');
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
    $avatar = null;
    try {
      if ($request->avatar != null) {
        $avatar = uploadImage($request->file('avatar'), 'user');
      }
      $this->class::create(array_merge(
        $request->only(
          "surname",
          "name",
          "patronymic",
          "phone_number",
          "email",
          "birthday",
          "gender",
          "is_complete",
          "agree_notification",
          "agree_sms",
          "agree_calls",
          "agree_data"
        ),
        ['avatar' => $avatar, 'id' => $this->class::nextID()]
      ));
      return ['status' => true, 'message' => "Успешно создано!"];
    } catch (Throwable $e) {
      return ['status' => false, 'message' => 'Что-то пошло не так: ' . $e->getMessage()];
    }
  }

  public function update($id, $request)
  {
    $model = $this->class::findOrFail($id);
    $avatar = $model->avatar;
    try {
      if ($request->avatar != null) {
        $avatar = uploadImage($request->file('avatar'), 'user', $avatar);
      }
      $model->update(array_merge(
        $request->only(
          "surname",
          "name",
          "patronymic",
          "phone_number",
          "email",
          "birthday",
          "gender",
          "is_complete",
          "agree_notification",
          "agree_sms",
          "agree_calls",
          "agree_data"
        ),
        ['avatar' => $avatar]
      ));
      return ['status' => true, 'message' => "Успешно обновлено: $id"];
    } catch (Throwable $e) {
      return ['status' => false, 'message' => 'Что-то пошло не так: ' . $e->getMessage()];
    }
  }
}
