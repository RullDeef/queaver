<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\LabQueue;
use App\Models\UserPlace;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            LabQueue::all()->each(function ($queue) {
                $queue->tasks->each(function($task) use ($queue) {
                    $users = User::inRandomOrder()->take(random_int(0, 20))->get();

                    $users->each(function($user) use ($task, $queue) {
                        UserPlace::create([
                            'user_id' => $user->id,
                            'lab_queue_id' => $queue->id,
                            'lab_task_id' => $task->id,
                        ]);
                    });
                });
            });
        });
    }
}
