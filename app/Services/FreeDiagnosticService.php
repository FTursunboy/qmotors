<?php

namespace App\Services;

use App\Models\FreeDiagnostic;
use App\Models\UserCar;
use App\Services\Contracts\FreeDiagnosticServiceInterface;

class FreeDiagnosticService implements FreeDiagnosticServiceInterface
{
  public $class;
  public $request;
  public function __construct()
  {
    $this->class = FreeDiagnostic::class;
    $this->request = request();
  }

  public function filter()
  {
    $order = requestOrder();
    return $this->class::where(function ($query) {
      // if ($this->request->user != null) {
      //   $query->whereHas('user', function ($query) {
      //     $query->where('surname', 'ilike', '%' . $this->request->user . '%')
      //       ->orWhere('name', 'ilike', '%' . $this->request->user . '%')
      //       ->orWhere('id', 'ilike', '%' . $this->request->user . '%');
      //   });
      // }
      if ($this->request->tech_center_id != null) {
        $query->where('tech_center_id', $this->request->tech_center_id);
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
      ->paginate($this->request->get('per_page', 20));
  }

  public function store($request)
  {
    $model = new $this->class;
    $model = $this->class::create(array_merge(
      $request->only($model->fillable),
      ['id' => $this->class::nextID()]
    ));
    return $model;
  }

  public function update($id, $request)
  {
    $model = $this->class::findOrFail($id);
    $model->update($request->only($model->fillable));
    return $model;
  }

  public function history($request)
  {
    return UserCar::with('free_diagnostics')->has('free_diagnostics')->where(function ($query) use ($request) {
      $query->where('user_id', auth()->id());
      if ($request->user_car_id)
        $query->where('id', $request->user_car_id);
    })->get();
  }
}
