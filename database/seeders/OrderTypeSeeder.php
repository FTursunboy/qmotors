<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    const TYPES = [
        [
            'name' => "Техническое обслуживание",
            'key' => 'maintenance'
        ],
        [
            'name' => "Слесарный ремонт",
            'key' => 'locksmith_repair'
        ],
        [
            'name' => "Кузовной ремонт",
            'key' => 'body_repair'
        ],
        [
            'name' => "Детейлинг",
            'key' => 'detailing'
        ],
        [
            'name' => "Другое",
            'key' => 'other'
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
