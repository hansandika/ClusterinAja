<?php

namespace Database\Seeders;

use App\Models\Cluster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClustersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cluster::create([
            'name' => 'Cluster Cikarang'
        ]);
        Cluster::create([
            'name' => 'Cluster Cikampek'
        ]);
        Cluster::create([
            'name' => 'Cluster Alam Sutra'
        ]);
    }
}
