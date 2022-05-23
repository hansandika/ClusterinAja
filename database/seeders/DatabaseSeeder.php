<?php

namespace Database\Seeders;

use App\Models\RequestCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClustersSeeder::class,
            UsersSeeder::class,
            ThreadCategorySeeder::class,
            ThreadsSeeder::class,
            RequestCategorySeeder::class,
            RequestsSeeder::class
        ]);
    }
}
