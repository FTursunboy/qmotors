<?php

namespace App\Http\Requests\Order;

use App\Models\CarModel;
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
        $hasUserCarId = request()->has('user_car_id');
        return [
            'user_car_id' => [
                $hasUserCarId ? 'required' : '',
                'exists:' . with(new UserCar)->getTable() . ',id'
            ],
            'car_model_id' => [
                !$hasUserCarId ? 'required' : '',
                'exists:' . with(new CarModel)->getTable() . ',id'
            ],
            'number' => !$hasUserCarId ? 'required' : '',
            'order_type' => Rule::in([0, 1, 2, 3, 4]),
            'date' => 'required|date'
        ];
    }
}
