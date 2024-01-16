<?php

namespace App\Services;

use App\Jobs\ProcessOrderMail;
use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\OrderPhoto;
use App\Models\UserCar;
use App\Services\Contracts\OrderServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Mail;

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
        // if ($request->has('user_car_id')) {
        //   $car = UserCar::find($request->user_car_id);
        // } else {
        //   $car = UserCar::firstOrCreate($request->only('number'), [
        //     'id' => UserCar::nextID(),
        //     'user_id' => auth()->id(),
        //     'car_model_id' => $request->car_model_id
        //   ]);
        // }
        // if ($car->user_id != auth()->id()) {
        //   return $this->notAccess();
        // }
        $model = $this->class::create(array_merge(
            $request->only(
                'tech_center_id',
                'order_type_id',
                'description',
                'date',
                'guarantee',
                'free_diagnostics',
                'stock_id',
                'mileage',
                'description'
            ),
            [
                'user_car_id' => $request->user_car_id,
                'order_type' => $request->order_type_id,
                'id' => $this->class::nextID(),
                'order_id' => $this->class::nextID(),
                'order_number' => $request->order_number
            ],
        ));

//        $this->sendMail($model);
        ProcessOrderMail::dispatch($model);
        return $model;
    }

    public function photo($id, $request)
    {
        $photo = uploadFile($request->file('photo'), 'order');
        return OrderPhoto::create([
            'id' => OrderPhoto::nextID(),
            'order_id' => $id,
            'photo' => $photo
        ]);
    }

    public function history($request)
    {
        return UserCar::with([
            'orders.stock',
            'orders.order_works',
            'orders.order_spares'
        ])->has('orders')->where(function ($query) use ($request) {
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

    public function update($id, $request)
    {
        // dd($request->all());
        $model = $this->class::findOrFail($id);
        $model->update($request->only(
            'order_type_id',
            'tech_center_id',
            'description',
            'date',
            'guarantee',
            'free_diagnostics',
            'user_car_id',
            'order_number',
            'stock_id',
            'mileage',
            'description'
        ));
        $model->guarantee = $request->get('guarantee', false);
        $model->free_diagnostics = $request->get('free_diagnostics', false);
        $model->save();
        return ['status' => true, 'model' => $model, 'message' => "Успешно обновлено: $id"];
    }

    public function sendMail($model)
    {
        $emails = explode(',', $model->tech_center->emails);
        foreach ($emails as $item) {
            $item = trim($item);
            Mail::to($item)->queue(new OrderCreated($model));
        }
    }

    public function delete($model)
    {
        $model->order_photos()->delete();
        $model->reviews()->delete();
        return $model;
    }
}
