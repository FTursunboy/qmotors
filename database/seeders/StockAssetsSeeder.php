<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Stock::all();
        foreach ($data as $item) {
            $item->text = str_replace('src="/uploads', 'src="/storage/uploads', $item->text);
            $item->save();
        }
    }
}
