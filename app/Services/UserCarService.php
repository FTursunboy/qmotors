<?php

namespace App\Services;

use App\Models\UserCar;
use App\Services\Contracts\UserCarServiceInterface;
use Throwable;

class UserCarService implements UserCarServiceInterface
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

    public function list($request)
    {
        $query = $this->class::where(function ($query) use ($request) {
            if ($request->search) {
                $query->where('id', 'ilike', '%' . $this->request->search . '%')
                    ->orWhereHas('model', function ($query) use ($request) {
                        $query->where('name', 'ilike', '%' . $request->search . '%');
                    })
                    ->orWhere('number', 'ilike', '%' . $this->request->search . '%');
            }
        });
        $filteredCount = $query->count();
        $result = $query->paginate($request->get('per_page', 20))->append('title');
        $page = $request->page;
        return compact('result', 'filteredCount', 'page');
    }

    public function filter()
    {
        $order = requestOrder();
        return $this->class::where(function ($query) {
            if ($this->request->model_id != null) {
                $query->where('car_model_id', $this->request->model_id);
            }
            if ($this->request->status != null) {
                $query->where('status', $this->request->status);
            }
            if ($this->request->user != null) {
                $query->whereHas('user', function ($query) {
                    $query->where('surname', 'ilike', '%' . $this->request->user . '%')
                        ->orWhere('name', 'ilike', '%' . $this->request->user . '%')
                        ->orWhere('id', 'ilike', '%' . $this->request->user . '%');
                });
            }
            if ($this->request->vin != null) {
                $query->where('vin', 'ilike', '%' . $this->request->vin . '%');
            }
            if ($this->request->number != null) {
                $query->where('number', 'ilike', '%' . $this->request->number . '%');
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

    public function store($request): array
    {
        try {
            $this->class::create([
                'id' => $this->class::nextID(),
                'user_id' => $request->user_id,
                'number' => $request->number,
                'car_model_id' => $request->model_id,
                'status' => $request->status,
                'year' => $request->year,
                'mileage' => $request->mileage,
                'vin' => $request->vin,
                'last_visit' => $request->last_visit,
            ]);
            return ['status' => true, 'message' => "Успешно создано!"];
        } catch (Throwable $e) {
            return ['status' => false, 'message' => 'Что-то пошло не так: ' . $e->getMessage()];
        }
    }

    public function update($id, $request): array
    {
        try {
            $model = $this->class::findOrFail($id);
            $model->update([
                'user_id' => $request->user_id,
                'number' => $request->number,
                'car_model_id' => $request->model_id,
                'status' => $request->status,
                'year' => $request->year,
                'mileage' => $request->mileage,
                'vin' => $request->vin,
                'last_visit' => $request->last_visit,
            ]);
            return ['status' => true, 'message' => "Успешно обновлено: $id"];
        } catch (Throwable $e) {
            return ['status' => false, 'message' => 'Что-то пошло не так: ' . $e->getMessage()];
        }
    }

    public function delete($model)
    {
        $model->user_car_photos()->delete();
        $model->reminders()->delete();
        $model->orders()->each(function ($item) {
            with(new OrderService)->delete($item);
        });
        $model->orders()->delete();
        $model->free_diagnostics()->delete();
        return $model;
    }
}
