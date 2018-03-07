<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::truncate();

        User::create([
            'uuid' => Str::uuid(),
            'name' => "Sawers SAW",
            'email' => "sawers@saw.com",
            'password' => bcrypt('secret'),
            'role' => "admin",
        ]);
        User::create([
            'uuid' => Str::uuid(),
            'name' => "Alain Dupont",
            'email' => "alain@dupont.com",
            'password' => bcrypt('secret'),
            'role' => "writter",
        ]);
        User::create([
            'uuid' => Str::uuid(),
            'name' => "John Doe",
            'email' => "john@doe.com",
            'password' => bcrypt('secret'),
            'role' => "user",
        ]);
    }
}
