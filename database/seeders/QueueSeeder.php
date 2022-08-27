<?php

namespace Database\Seeders;

use App\Models\LabQueue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueueSeeder extends Seeder
{
    protected $queueNames = ['OS', 'Databases', 'AA', 'Network', 'Web', 'Security', 'Other'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $factory = LabQueue::factory();

            foreach ($this->queueNames as $queueName)
                $factory->create(['name' => $queueName]);
        });
    }
}
