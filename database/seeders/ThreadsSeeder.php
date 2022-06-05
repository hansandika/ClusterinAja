<?php

namespace Database\Seeders;

use App\Models\Cluster;
use App\Models\Thread;
use App\Models\ThreadCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThreadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        for ($i = 0; $i < 5; $i++) {
            $users[$i] = User::where('id', rand(1, User::count() - 1) + 1)->first();
        }

        Thread::create([
            'user_id' => $users[0]->id,
            'title' => 'First thread',
            'cluster_id' => $users[0]->cluster_id,
            'slug' => \Str::slug('First thread'),
            'description' =>  'Hello this is my first thread',
            'thread_category_id' => rand(1, ThreadCategory::count()),
        ]);

        Thread::create([
            'user_id' => $users[1]->id,
            'title' => 'Second thread',
            'cluster_id' => $users[1]->cluster_id,
            'slug' => \Str::slug('Second thread'),
            'description' =>  'Hello this is my second thread',
            'thread_category_id' => rand(1, ThreadCategory::count()),
        ]);

        Thread::create([
            'user_id' => $users[2]->id,
            'title' => 'First thread',
            'cluster_id' => $users[2]->cluster_id,
            'slug' => \Str::slug('Third thread'),
            'description' =>  'Hello this is my third thread',
            'thread_category_id' => rand(1, ThreadCategory::count()),
        ]);

        Thread::create([
            'user_id' => $users[3]->id,
            'title' => 'Neighbourhood problem',
            'cluster_id' => $users[3]->cluster_id,
            'slug' => \Str::slug('Neighbourhood problem'),
            'description' =>  'Haiya my neighbour very annoyingla, she open spotify very very loud that burst my ear bud',
            'thread_category_id' => 4,
        ]);

        Thread::create([
            'user_id' => $users[4]->id,
            'title' => 'Electricity',
            'cluster_id' => $users[3]->cluster_id,
            'slug' => \Str::slug('Electricity'),
            'description' =>  'My houses always blackout since i haven\'t pay the electricity, please help me',
            'thread_category_id' => 3,
        ]);
    }
}
