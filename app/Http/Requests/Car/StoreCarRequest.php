<?php

namespace App\Http\Requests\Car;

use App\Models\CarModel;
use App\Models\UserCar;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCarRequest extends FormRequest
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
        return [
            'car_model_id' => 'required|exists:car_models,id',
            'status' => Rule::in([0, 1, 2]),
            // 'number' => 'unique:' . with(new UserCar)->getTable(),
            'vin' => 'nullable',
            'last_visit' => 'date'
        ];
    }
}
