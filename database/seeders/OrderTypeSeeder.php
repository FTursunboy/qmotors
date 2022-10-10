<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    const TYPES = [
        [
            'name' => "Техническое обслуживание"
        ],
        [
            'name' => "Слесарный ремонт"
        ],
        [
            'name' => "Кузовной ремонт"
        ],
        [
            'name' => "Детейлинг"
        ],
        [
            'name' => "Другое"
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderType::truncate();
        OrderType::insert(self::TYPES);
    }
}
