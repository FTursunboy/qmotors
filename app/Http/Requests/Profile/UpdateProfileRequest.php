<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'avatar' => 'image',
            'gender' => Rule::in([0, 1]),
            'birthday' => 'date',
            'agree_notification' => 'boolean',
            'agree_sms' => 'boolean',
            'agree_calls' => 'boolean',
            'agree_data' => 'boolean'
        ];
    }
}
