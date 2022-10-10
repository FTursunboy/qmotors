<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Article::all();
        foreach ($data as $item) {
            $item->text = str_replace('src="/uploads', 'src="/storage/uploads', $item->text);
            $item->save();
        }
    }
}
