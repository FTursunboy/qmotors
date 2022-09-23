<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use Throwable;

class UserService implements UserServiceInterface
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
      $this->class = User::class;
    } else {
      $this->class = $class;
    }
  }
  public function list($request)
  {
    return $this->class::where(function ($query) use ($request) {
      if ($request->q) {
        $query->where('phone_number', 'ilike', '%' . $this->request->q . '%')
          ->orWhere('surname', 'ilike', '%' . $this->request->q . '%')
          ->orWhere('name', 'ilike', '%' . $this->request->q . '%')
          ->orWhere('patronymic', 'ilike', '%' . $this->request->q . '%');
      }
    })->get()->append('fullname');
  }
  public function filter($pushToken = false)
  {
    $order = requestOrder();
    return $this->class::where(function ($query) use ($pushToken) {
      if ($this->request->phone_number != null) {
        $query->where('phone_number', 'ilike', '%' . $this->request->phone_number . '%');
      }
      if ($this->request->surname != null) {
        $query->where('surname', 'ilike', '%' . $this->request->surname . '%');
      }
      if ($this->request->name != null) {
        $query->where('name', 'ilike', '%' . $this->request->name . '%');
      }
      if ($this->request->patronymic != null) {
        $query->where('patronymic', 'ilike', '%' . $this->request->patronymic . '%');
      }
      if ($this->request->is_complete != null) {
        $query->where('is_complete', $this->request->is_complete);
      }
      if ($this->request->gender != null) {
        $query->where('gender', $this->request->gender);
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
      if ($pushToken) {
        $query->whereNotNull('fcmtoken')->where('fcmtoken', '!=', '');
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
        $avatar = uploadFile($request->file('avatar'), 'user');
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
    // dd($request->all());
    $model = $this->class::findOrFail($id);
    $avatar = $model->avatar;
    try {
      if ($request->avatar != null) {
        $avatar = uploadFile($request->file('avatar'), 'user', $avatar);
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
      return ['status' => true, 'message' => "Успешно обновлено: $id", "model" => $model];
    } catch (Throwable $e) {
      return ['status' => false, 'message' => 'Что-то пошло не так: ' . $e->getMessage()];
    }
  }

  public function updateApi($request)
  {
    $model = auth()->user();
    $avatar = $model->avatar;
    if ($request->avatar != null) {
      $avatar = uploadFile($request->file('avatar'), 'user', $avatar);
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
        "agree_notification",
        "agree_sms",
        "agree_calls",
        "agree_data"
      ),
      ['avatar' => $avatar]
    ));
    return User::find($model->id);
  }
}
