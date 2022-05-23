<?php

namespace Database\Seeders;

use App\Models\Request;
use App\Models\RequestCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            Request::create([
                'user_id' => rand(1, User::count()),
                'title' => $faker->sentence(),
                'description' =>  $faker->paragraph(),
                'status' => rand(1, 3),
                'request_category_id' => rand(1, RequestCategory::count()),
            ]);
        }
    }
}
