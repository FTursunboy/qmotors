<?php

namespace App\Services;

use App\Models\UserCar;

class UserCarService
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
      $this->class = UserCar::class;
    } else {
      $this->class = $class;
    }
  }
  public function filter()
  {
    $order = requestOrder();
    return $this->class::where(function ($query) {
      if ($this->request->model_id != null) {
        $query->where('car_model_id', $this->request->model_id);
      }
      if ($this->request->user != null) {
        $query->whereHas('user', function ($query) {
          $query->where('surname', 'ilike', '%' . $this->request->user . '%')
            ->orWhere('name', 'ilike', '%' . $this->request->user . '%');
        });
      }
      if ($this->request->has('vin')) {
        $query->where('vin', 'ilike', '%' . $this->request->vin . '%');
      }
      if ($this->request->year_start != null) {
        $query->where('year', '>=', $this->request->year_start);
      }
      if ($this->request->year_end != null) {
        $query->where('year', '<=', $this->request->year_end);
      }
      if ($this->request->mileage_start != null) {
        $query->whereRaw('CAST(mileage as INTEGER) >= ?', [$this->request->mileage_start]);
      }
      if ($this->request->mileage_end != null) {
        $query->whereRaw('CAST(mileage as INTEGER) <= ?', [$this->request->mileage_end]);
      }
      if ($this->request->free_diagnostics_start != null) {
        $query->whereHas('freeDiagnostics', function ($query) {
          $query->whereDate('date', '>=', $this->request->free_diagnostics_start);
        });
      }
      if ($this->request->free_diagnostics_end != null) {
        $query->whereHas('freeDiagnostics', function ($query) {
          $query->whereDate('date', '<=', $this->request->free_diagnostics_end);
        });
      }
      if ($this->request->reminder_start != null) {
        $query->whereHas('reminders', function ($query) {
          $query->whereDate('date', '>=', $this->request->reminder_start);
        });
      }
      if ($this->request->reminder_end != null) {
        $query->whereHas('reminders', function ($query) {
          $query->whereDate('date', '<=', $this->request->reminder_end);
        });
      }
      if ($this->request->order_start != null) {
        $query->whereHas('orders', function ($query) {
          $query->whereDate('date', '>=', $this->request->order_start);
        });
      }
      if ($this->request->order_end != null) {
        $query->whereHas('orders', function ($query) {
          $query->whereDate('date', '<=', $this->request->order_end);
        });
      }
      if ($this->request->last_visit_start != null) {
        $query->whereDate('last_visit', '>=', $this->request->last_visit_start);
      }
      if ($this->request->last_visit_end != null) {
        $query->whereDate('last_visit', '<=', $this->request->last_visit_end);
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
}
