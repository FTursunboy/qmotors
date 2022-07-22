<?php

namespace App\Http\Requests\Car;

use App\Models\CarModel;
use App\Models\UserCar;
use App\Traits\RequestID;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCarRequest extends FormRequest
{
    use RequestID;
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
            'id' => 'required|exists:' . with(new UserCar)->getTable(),
            'car_model_id' => 'required|exists:' . with(new CarModel())->getTable() . ',id',
            'status' => Rule::in([0, 1, 2]),
            'last_visit' => 'date'
        ];
    }
}
