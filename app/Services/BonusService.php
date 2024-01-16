<?php

namespace App\Services;

use App\Jobs\ProcessPushNotification;
use App\Models\Bonus;
use App\Services\Contracts\BonusServiceInterface;
use Carbon\Carbon;

class BonusService implements BonusServiceInterface
{
    public $class;
    public $request;

    public function __construct()
    {
        $this->class = Bonus::class;
        $this->request = request();
    }

    public function filter()
    {
        $order = requestOrder();
        return $this->class::where(function ($query) {
            if ($this->request->user != null) {
                $query->whereHas('user', function ($query) {
                    $query->where('surname', 'ilike', '%' . $this->request->user . '%')
                        ->orWhere('name', 'ilike', '%' . $this->request->user . '%')
                        ->orWhere('id', 'ilike', '%' . $this->request->user . '%');
                });
            }
            if ($this->request->status != null) {
                $query->where('status', $this->request->status);
            }
            if ($this->request->bonus_type != null) {
                $query->where('bonus_type', $this->request->bonus_type);
            }
            if ($this->request->points_start != null) {
                $query->where('points', '>=', $this->request->points_start);
            }
            if ($this->request->points_end != null) {
                $query->where('points', '<=', $this->request->points_end);
            }
            if ($this->request->remainder_start != null) {
                $query->where('remainder', '>=', $this->request->remainder_start);
            }
            if ($this->request->remainder_end != null) {
                $query->where('remainder', '<=', $this->request->remainder_end);
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

        $model = $this->class::create(array_merge(
            $request->only('user_id', 'title', 'points', 'bonus_type'),
            [
                'id' => $this->class::nextID(),
                'status' => $request->get('status', 0) ?? 0,
                'burn_date' => $request->get('burn_date') ?? date('Y-m-d', strtotime('+1 year')),
//                'remainder' => $request->points
            ]
        ));

        ProcessPushNotification::dispatch($request->collect(), $model);

        return $model;
    }

    public function update($id, $request)
    {
        $model = $this->class::findOrFail($id);
        $model->update(array_merge(
            $request->only('user_id', 'title', 'points'),
            [
                'status' => $request->get('status', 0) ?? 0,
                'bonus_type' => $request->get('bonus_type', 0) ?? 0,
                'remainder' => $request->points,
                'burn_date' => $request->burn_date ?? date('Y-m-d', strtotime('+1 year'))
            ]
        ));
        return $model;
    }

    public function burn()
    {
        $burnBonuses = Bonus::whereNotNull('bonus_accrual_id')->get();
        $bonuses = Bonus::whereDate('burn_date', date('Y-m-d'))->where('bonus_type', '!=', 'utilization')->get();
        foreach ($bonuses as $bonus) {
            if ($burnBonuses->firstWhere('bonus_accrual_id', $bonus->id) == null) {
                $accrual = $bonus->replicate();
                $accrual->bonus_accrual_id = $bonus->id;
                $accrual->burn_date = null;
                $accrual->bonus_type = 'utilization';
                $accrual->created_at = Carbon::now();
                $accrual->id = Bonus::nextID();
                $accrual->save();
            }
        }
    }
}
