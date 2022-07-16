<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultSmsCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->update(['sms_code' => env('DEFAULT_SMS_CODE', null)]);
    }
}
