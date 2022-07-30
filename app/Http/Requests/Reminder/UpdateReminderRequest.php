<?php

namespace App\Http\Requests\Reminder;

use App\Models\Reminder;
use App\Models\UserCar;
use App\Traits\RequestID;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReminderRequest extends FormRequest
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
            'id' => 'required|exists:' . with(new Reminder())->getTable(),
            'user_car_id' => 'exists:' . with(new UserCar())->getTable() . ',id',
            'date' => 'date'
        ];
    }
}
