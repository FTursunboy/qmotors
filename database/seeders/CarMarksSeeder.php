<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarMarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $file_path = public_path('response.json');
        $data =[];
        if (file_exists($file_path)) {
            $json_content = file_get_contents($file_path);

            $cars = json_decode($json_content, true, 512, JSON_UNESCAPED_UNICODE);

            if ($cars !== null) {
                foreach ($cars['result'] as $car) {
                    $data[] = [
                        'id'   => $car['id'],
                        'name' => $car['name'],
                        'created_at' => Carbon::now()
                    ];
                }
                DB::table('car_models')->insert($data);
            }
        }
    }
}
