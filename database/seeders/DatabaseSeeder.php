<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\LabTaskSeeder;
use Database\Seeders\LabQueueSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            // create special users
            $this->createAdmins();

            $this->call([
                UserSeeder::class,
                LabQueueSeeder::class,
                LabTaskSeeder::class,
            ]);
        });
    }

    protected function createAdmins()
    {
    }
}
