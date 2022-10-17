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
    $query = $this->class::where(function ($query) use ($request) {
      if ($request->search) {
        $query
          // ->whereRaw('phone_number ilike %' . $request->search . '%')
          // ->whereRaw('REPLACE(REPLACE(REPLACE(REPLACE(phone_number, " ", ""), "-", ""), ")", ""), "(", "") ilike %?%', [$request->phone_number])
          ->where('phone_number', 'ilike', '%' . $this->request->search . '%')
          ->orWhere('surname', 'ilike', '%' . $this->request->search . '%')
          ->orWhere('name', 'ilike', '%' . $this->request->search . '%')
          ->orWhere('patronymic', 'ilike', '%' . $this->request->search . '%');
      }
    });
    $filteredCount = $query->count();
    $result = $query->paginate($request->get('per_page', 20))->append('fullname');
    $page = $request->page;
    // $result = $query->get();
    // foreach ($result as $item) {
    //   $item->phone_number = str_replace([' ', '-', '(', ')'], '', $item->phone_number);
    // }
    // $result = $result->where('phone_number')
    return compact('result', 'filteredCount', 'page');
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
    // try {
    if ($request->avatar != null) {
      $avatar = uploadFile($request->file('avatar'), 'user');
    }
    $model = $this->class::create(array_merge(
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
    $bonusService = new BonusService();
    $bonusService->store($request->merge([
      'title' => 'Для регистрации',
      'points' => 350,
      'user_id' => $model->id,
      'bonus_type' => 0
    ]));
    return ['status' => true, 'message' => "Успешно создано!"];
    // } catch (Throwable $e) {
    //   return ['status' => false, 'message' => 'Что-то пошло не так: ' . $e->getMessage()];
    // }
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

  public function delete($id)
  {
    $user = User::find($id);
    $user->bonuses()->delete();
    $user->user_cars()->each(function ($item) {
      $item->user_car_photos()->delete();
      $item->reminders()->delete();
      $item->orders()->delete();
    })->delete();
    $user->chat()->delete();
    $user->chat_messages()->delete();
    $user->free_diagnostics()->delete();
    $user->notifications()->delete();
    $user->delete();
  }
}
