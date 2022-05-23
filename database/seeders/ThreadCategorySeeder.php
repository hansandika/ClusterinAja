<?php

namespace Database\Seeders;

use App\Models\ThreadCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThreadCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThreadCategory::create([
            'name' => 'Watery'
        ]);

        ThreadCategory::create([
            'name' => 'Financial'
        ]);

        ThreadCategory::create([
            'name' => 'Electricity'
        ]);

        ThreadCategory::create([
            'name' => 'Other'
        ]);
    }
}
