<?php

namespace App\Services;

use App\Models\CarModel;
use App\Models\UserCar;
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
      $request->only('car_model_id', 'year', 'last_visit', 'vin', 'mileage'),
      ['user_id' => auth()->id(), 'status' => $request->get('status', 0), 'id' => $this->class::nextID()],
    ));
    return $model;
  }

  public function update($id, $request)
  {
    $model = $this->class::findOrFail($id);
    $model->update(array_merge(
      $request->only('car_model_id', 'year', 'last_visit', 'vin', 'mileage'),
      ['status' => $request->get('status', 0)],
    ));
    return $model;
  }

  public function modelList($request)
  {
    return CarModel::where(function ($query) use ($request) {
      if ($query->car_mark_id != null) {
        $query->where('car_mark_id', $request->car_mark_id);
      }
    });
  }
}
