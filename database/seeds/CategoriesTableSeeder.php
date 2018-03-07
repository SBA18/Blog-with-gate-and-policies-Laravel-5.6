<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Category::truncate();

        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "World",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "U.S.",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Technology",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Design",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Culture",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Business",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Politics",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Opinion",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Science",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Health",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Style",
        ]);
        Category::create([
            'uuid' => Str::uuid(),
            'user_id' => mt_rand(1, 2),
            'title' => "Travel",
        ]);
    }
}
