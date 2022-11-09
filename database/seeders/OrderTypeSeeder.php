<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    const TYPES = [
        [
            'id' => 1,
            'name' => "Техническое обслуживание",
            'key' => 'maintenance'
        ],
        [
            'id' => 2,
            'name' => "Слесарный ремонт",
            'key' => 'locksmith_repair'
        ],
        [
            'id' => 3,
            'name' => "Кузовной ремонт",
            'key' => 'body_repair'
        ],
        [
            'id' => 4,
            'name' => "Детейлинг",
            'key' => 'detailing'
        ],
        [
            'id' => 5,
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
//        OrderType::truncate();
//        OrderType::insert(self::TYPES);
        foreach (self::TYPES as $item) {
            OrderType::updateOrCreate(['id' => $item['id']], [
                'name' => $item['name'],
                'key' => $item['key']
            ]);
        }
    }
}
