<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderPhoto;
use App\Models\User;
use App\Models\UserCar;
use App\Services\Contracts\OrderServiceInterface;
use App\Traits\ApiResponse;

class OrderService implements OrderServiceInterface
{
  use ApiResponse;
  public $class;
  public function __construct()
  {
    $this->class = Order::class;
  }

  public function store($request)
  {
    if ($request->has('user_car_id')) {
      $car = UserCar::find($request->user_car_id);
    } else {
      $car = UserCar::firstOrCreate($request->only('number'), [
        'id' => UserCar::nextID(),
        'user_id' => auth()->id(),
        'car_model_id' => $request->car_model_id
      ]);
    }
    if ($car->user_id != auth()->id()) {
      return $this->error(['message' => 'У вас нет доступа!'], 403);
    }
    $model = $this->class::create(array_merge(
      $request->only(
        'order_type_id',
        'tech_center_id',
        'description',
        'date',
        'guarantee'
      ),
      [
        'user_car_id' => $car->id,
        'id' => $this->class::nextID(),
        'order_number' => $request->number
      ],
    ));
    return $this->success($model, 201);
  }

  public function photo($id, $request)
  {
    $photo = uploadImage($request->file('photo'), 'order');
    $model = OrderPhoto::create([
      'id' => OrderPhoto::nextID(),
      'order_id' => $id,
      'photo' => $photo
    ]);
    return $model;
  }

  public function history($request)
  {
    return UserCar::with('orders')->has('orders')->where(function ($query) use ($request) {
      $query->where('user_id', auth()->id());
      if ($request->user_car_id)
        $query->where('id', $request->user_car_id);
    })->get();
  }

  public function filter()
  {
    $order = requestOrder();
    return $this->class::where(function ($query) {
      if (request()->guarantee != null) {
        $query->where('guarantee', request()->guarantee);
      }
    })
      ->orderBy($order['key'], $order['value'])
      ->paginate(request()->get('per_page', 20));
  }
}
