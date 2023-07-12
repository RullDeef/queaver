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
use Database\Seeders\UserPlaceSeeder;

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
                UserPlaceSeeder::class,
            ]);
        });
    }

    protected function createAdmins()
    {
        UserRole::create([
            'user_id' => User::factory()->create([
                'name' => 'User',
                'surname' => 'UserSurname',
                'email' => 'user@mail.ru',
                'password' => Hash::make('password'),
                'group_index' => 1,
                'graduation_year' => 2024,
            ])->id,
            'role' => UserRole::ADMIN,
        ]);
    }
}
