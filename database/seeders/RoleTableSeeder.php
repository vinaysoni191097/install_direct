<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'name' => 'Admin', 'description' => 'Admin role', 'status' => 1],
            ['id' => 2, 'name' => 'User', 'description' => 'User role', 'status' => 1],
        ];

        DB::table('roles')->insert($roles);
    }
}
