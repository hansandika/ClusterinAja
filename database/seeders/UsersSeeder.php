<?php

namespace Database\Seeders;

use App\Models\Cluster;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'dob' => Carbon::now(),
            'biography' => 'dummy',
            'cluster_id' => rand(1, Cluster::count())
        ]);

        User::create([
            'name' => 'hans',
            'email' => 'hans@mail.com',
            'password' => bcrypt('hansgeovani2'),
            'dob' => Carbon::now(),
            'biography' => 'dummy',
            'cluster_id' => rand(1, Cluster::count())
        ]);

        User::create([
            'name' => 'ryne',
            'email' => 'ryne@gmail.com',
            'password' => bcrypt('ryne2'),
            'dob' => Carbon::now(),
            'biography' => 'dummy',
            'cluster_id' => rand(1, Cluster::count())
        ]);
    }
}
