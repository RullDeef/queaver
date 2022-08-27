<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $users = User::factory(100)->create();

            // create some roles for them
            $users->shuffle()->take(10)->each(fn (User $user) => UserRole::create([
                'user_id' => $user->id,
                'role' => UserRole::MODERATOR,
            ]));
        });
    }
}
