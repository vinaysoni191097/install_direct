<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyProfile = [
            [
                'id' => 1,
                'company_name' => 'Install Direct',
                'company_email' => 'hello@installsdirect.com',
                'company_phone_number' => '1234567890',
                'facebook_url' => 'https://www.facebook.com/people/Installs-Direct/61554612986809/',
                'site_url' => 'http://installsdirect.co.uk/',
            ],
        ];

        DB::table('settings')->insert($companyProfile);
    }
}
