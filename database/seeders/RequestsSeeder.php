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
        Request::create([
            'user_id' => rand(1, User::count()),
            'title' => "Air conditioner broken",
            'description' => 'Please help me, there\' some problem with my airconditioner, it cannot turn on',
            'status' => rand(1, 3),
            'request_category_id' => rand(1, RequestCategory::count()),
        ]);

        Request::create([
            'user_id' => rand(1, User::count()),
            'title' => "Household maintanance",
            'description' => 'There\' some problem with my household, can annyone do it for me',
            'status' => rand(1, 3),
            'request_category_id' => rand(1, RequestCategory::count()),
        ]);

        Request::create([
            'user_id' => rand(1, User::count()),
            'title' => "Street light",
            'description' => 'There is a problem with the street light, need help asap',
            'status' => rand(1, 3),
            'request_category_id' => rand(1, RequestCategory::count()),
        ]);

        Request::create([
            'user_id' => rand(1, User::count()),
            'title' => "Wall break",
            'description' => 'There\' someone trying to open my house, they break the wall. Please help me! I\'m afraid',
            'status' => rand(1, 3),
            'request_category_id' => rand(1, RequestCategory::count()),
        ]);

        Request::create([
            'user_id' => rand(1, User::count()),
            'title' => "Pet help",
            'description' => 'Please help me, my dog got bitten by a bee',
            'status' => rand(1, 3),
            'request_category_id' => rand(1, RequestCategory::count()),
        ]);
    }
}
