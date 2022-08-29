<?php

namespace Database\Seeders;

use App\Models\LabTask;
use App\Models\LabQueue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LabTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            LabQueue::all()->each(function($queue) {
                $queue->tasks()->saveMany(LabTask::factory(rand(0, 10))->make());
            });
        });
    }
}
