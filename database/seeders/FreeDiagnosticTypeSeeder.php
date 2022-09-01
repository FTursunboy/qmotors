<?php

namespace Database\Seeders;

use App\Models\FreeDiagnosticType;
use Illuminate\Database\Seeder;

class FreeDiagnosticTypeSeeder extends Seeder
{
    const TYPES = [
        [
            'name' => "САЛОН, ЭЛЕКТРИКА"
        ],
        [
            'name' => "ПОДКАПОТНОЕ ПРОСТРАНСТВО"
        ],
        [
            'name' => "ХОДОВАЯ (ПОДВЕСКИ)"
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreeDiagnosticType::query()->delete();
        FreeDiagnosticType::insert(self::TYPES);
    }
}
