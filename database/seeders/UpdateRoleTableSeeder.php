<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 3, 'name' => 'Technician', 'description' => 'Technician role', 'status' => 1],
        ];

        DB::table('roles')->insert($roles);
    }
}
