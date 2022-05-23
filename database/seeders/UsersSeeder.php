<?php

namespace Database\Seeders;

use App\Models\Cluster;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'dob' => Carbon::now(),
            'biography' => $faker->paragraph(),
            'cluster_id' => rand(1, Cluster::count())
        ]);

        User::create([
            'email' => 'hans@mail.com',
            'password' => bcrypt('hansgeovani2'),
            'dob' => Carbon::now(),
            'biography' => $faker->paragraph(),
            'cluster_id' => rand(1, Cluster::count())
        ]);

        User::create([
            'email' => 'hansandika70@gmail.com',
            'password' => bcrypt('hansgeovani2'),
            'dob' => Carbon::now(),
            'biography' => $faker->paragraph(),
            'cluster_id' => rand(1, Cluster::count())
        ]);

        User::create([
            'email' => 'ryne@gmail.com',
            'password' => bcrypt('ryne2'),
            'dob' => Carbon::now(),
            'biography' => $faker->paragraph(),
            'cluster_id' => rand(1, Cluster::count())
        ]);
    }
}
