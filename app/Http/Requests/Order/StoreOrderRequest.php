<?php

namespace App\Http\Requests\Order;

use App\Models\CarModel;
use App\Models\OrderType;
use App\Models\Stock;
use App\Models\TechCenter;
use App\Models\UserCar;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // $hasUserCarId = request()->has('user_car_id');
        return [
            'user_car_id' => [
                'required',
                'exists:' . with(new UserCar)->getTable() . ',id'
            ],
            'number' => 'required',
            'order_type_id' => 'required|exists:' . with(new OrderType)->getTable() . ',id',
            'tech_center_id' => 'required|exists:' . with(new TechCenter)->getTable() . ',id',
            'date' => 'required|date|after:yesterday',
            'guarantee' => 'boolean',
            'stock_id' => 'exists:' . with(new Stock)->getTable() . ',id'
        ];
    }
}
