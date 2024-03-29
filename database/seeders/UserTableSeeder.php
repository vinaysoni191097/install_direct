<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        $users = [
            [
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
            ],
        ];
        DB::table('users')->insert($users);

        $userData = [
            [
                'user_id' => 1,
                'first_name' => 'Admin',
                'last_name' => 'Admin',
            ],
        ];
        DB::table('user_profiles')->insert($userData);
    }
}
