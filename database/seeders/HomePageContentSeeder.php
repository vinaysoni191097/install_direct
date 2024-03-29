<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $home_page_content = [
            'banner_headline' => 'Create and Design a Solar System that Suits You',
            'banner_tagline' => 'Clean Energy for a Brighter Future.',
            'center_banner_text' => '',
            'center_banner_headline',
        ];

        DB::table('home_pages')->insert($home_page_content);
    }
}
