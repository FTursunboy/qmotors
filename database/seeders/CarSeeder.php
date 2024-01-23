<?php

namespace Database\Seeders;

use App\Models\CarMark;
use App\Models\CarModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_path = public_path('cars.json');
        if (file_exists($file_path)) {
            $json_content = file_get_contents($file_path);

            $cars = json_decode($json_content, true, 512, JSON_UNESCAPED_UNICODE);

            if ($cars !== null) {
                foreach ($cars as $car) {
                    $carMark = CarMark::create([
                        'name' => $car['name'],
                    ]);

                    foreach ($car['models'] as $model) {
                        CarModel::create([
                            'name' => $model['name'],
                            'car_mark_id' => $carMark->id,
                        ]);
                    }
                }
            }
        }
    }
}
