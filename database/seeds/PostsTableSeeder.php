<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Post;
use Illuminate\Support\Str;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Post::truncate();

        foreach(range(10, 100) as $i) {
            Post::create([
                'user_id' => rand(1, 2),
                'title' => $faker->sentence(6, true),
                'slug' => $faker->slug,
                'category_id' => rand(1, 10),
                'body' => $faker->paragraph,
                'status' => mt_rand(0 ,1) ,
            ]);
        }
    }
}
