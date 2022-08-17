<?php

namespace App\Services;

use App\Models\CarModel;
use App\Models\Order;
use App\Models\Reminder;
use App\Models\UserCar;
use App\Models\UserCarPhoto;
use App\Services\Contracts\CarServiceInterface;
use Illuminate\Support\Facades\Http;

class CarService implements CarServiceInterface
{
  public $class;
  public function __construct()
  {
    $this->class = UserCar::class;
  }

  public function store($request)
  {
    $model = $this->class::create(array_merge(
      $request->only('car_model_id', 'year', 'last_visit', 'vin', 'mileage', 'number'),
      ['user_id' => auth()->id(), 'status' => $request->get('status', 0), 'id' => $this->class::nextID()],
    ));
    return $model;
  }

  public function update($id, $request)
  {
    $model = $this->class::findOrFail($id);
    $model->update(array_merge(
      $request->only('car_model_id', 'year', 'last_visit', 'vin', 'mileage', 'number'),
      ['status' => $request->get('status', 0)],
    ));
    return $model;
  }

  public function modelList($request)
  {
    return CarModel::where(function ($query) use ($request) {
      if ($request->car_mark_id != null) {
        $query->where('car_mark_id', $request->car_mark_id);
      }
    })->get();
  }

  public function photo($id, $request)
  {
    $photo = uploadImage($request->file('photo'), 'user_car');
    $model = UserCarPhoto::create([
      'id' => UserCarPhoto::nextID(),
      'user_car_id' => $id,
      'photo' => $photo
    ]);
    return $model;
  }

  public function photoDelete($id)
  {
    $model = UserCarPhoto::find($id);
    deletePhoto($model->photo);
    $model->delete();
    return true;
  }

  public function delete($id)
  {
    Order::where('user_car_id', $id)->delete();
    Reminder::where('user_car_id', $id)->delete();
    UserCarPhoto::where('user_car_id', $id)->delete();
    return UserCar::where('id', $id)->delete();
  }
}
