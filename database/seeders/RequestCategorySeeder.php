<?php

namespace Database\Seeders;

use App\Models\RequestCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequestCategory::create([
            'name' => 'help'
        ]);
        RequestCategory::create([
            'name' => 'maintanance'
        ]);
        RequestCategory::create([
            'name' => 'repair'
        ]);
    }
}
