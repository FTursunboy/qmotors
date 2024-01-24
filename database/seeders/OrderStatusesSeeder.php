<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::query()->truncate();
        OrderStatus::insert([
            ['title' => 'Создано'],
            ['title' => 'Подтверждено'],
            ['title' => 'На приемке'],
            ['title' => 'В работе'],
            ['title' => 'Готово'],
            ['title' => 'Оплачено'],
            ['title' => 'Отменено']
        ]);
    }
}
