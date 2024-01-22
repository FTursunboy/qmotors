<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarMarksSeeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// Преобразуем JSON в ассоциативный массив
        $arrayData = json_decode($data, true);

// Инициализируем пустой массив для хранения сидов
        $seeds = [];

// Итерируем по элементам и добавляем сиды в массив
        foreach ($arrayData['result'] as $car) {
            $seeds[] = [
                'id' => $car['id'],
                'name' => $car['name'],
            ];
        }
    }
}
