<?php

namespace Database\Seeders;

use App\Models\Thread;
use App\Models\ThreadCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ThreadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $title = $faker->sentence();
            Thread::create([
                'user_id' => rand(1, User::count()),
                'title' => $title,
                'slug' => \Str::slug($title),
                'description' =>  $faker->paragraph(),
                'thread_category_id' => rand(1, ThreadCategory::count()),
            ]);
        }
    }
}
