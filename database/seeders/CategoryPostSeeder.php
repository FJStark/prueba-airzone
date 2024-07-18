<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            DB::table('category_post')->insert([
                'category_id' => (Category::all()->random())->id,
                'post_id' => (Post::doesntHave('categories')->first())->id
            ]);
        }
    }
}
