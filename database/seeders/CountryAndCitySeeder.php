<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryAndCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countryAndcities = [
            ['state_code' => '1', 'city_name' => 'Bath'],
            ['state_code' => '1', 'city_name' => 'Birmingham'],
            ['state_code' => '1', 'city_name' => 'Bradford'],
            ['state_code' => '1', 'city_name' => 'Brighton & Hove'],
            ['state_code' => '1', 'city_name' => 'Bristol'],
            ['state_code' => '1', 'city_name' => 'Cambridge'],
            ['state_code' => '1', 'city_name' => 'Canterbury'],
            ['state_code' => '1', 'city_name' => 'Carlisle'],
            ['state_code' => '1', 'city_name' => 'Chelmsford'],
            ['state_code' => '1', 'city_name' => 'Chester'],
            ['state_code' => '1', 'city_name' => 'Chichester'],
            ['state_code' => '1', 'city_name' => 'Colchester'],
            ['state_code' => '1', 'city_name' => 'Coventry'],
            ['state_code' => '1', 'city_name' => 'Derby'],
            ['state_code' => '1', 'city_name' => 'Doncaster'],
            ['state_code' => '1', 'city_name' => 'Durham'],
            ['state_code' => '1', 'city_name' => 'Ely'],
            ['state_code' => '1', 'city_name' => 'Exeter'],
            ['state_code' => '1', 'city_name' => 'Gloucester'],
            ['state_code' => '1', 'city_name' => 'Hereford'],
            ['state_code' => '1', 'city_name' => 'Kingston-upon-Hull'],
            ['state_code' => '1', 'city_name' => 'Lancaster'],
            ['state_code' => '1', 'city_name' => 'Leeds'],
            ['state_code' => '1', 'city_name' => 'Leicester'],
            ['state_code' => '1', 'city_name' => 'Lichfield'],
            ['state_code' => '1', 'city_name' => 'Lincoln'],
            ['state_code' => '1', 'city_name' => 'Liverpool'],
            ['state_code' => '1', 'city_name' => 'London'],
            ['state_code' => '1', 'city_name' => 'Manchester'],
            ['state_code' => '1', 'city_name' => 'Milton Keynes'],
            ['state_code' => '1', 'city_name' => 'Newcastle-upon-Tyne'],
            ['state_code' => '1', 'city_name' => 'Norwich'],
            ['state_code' => '1', 'city_name' => 'Nottingham'],
            ['state_code' => '1', 'city_name' => 'Oxford'],
            ['state_code' => '1', 'city_name' => 'Peterborough'],
            ['state_code' => '1', 'city_name' => 'Plymouth'],
            ['state_code' => '1', 'city_name' => 'Portsmouth'],
            ['state_code' => '1', 'city_name' => 'Preston'],
            ['state_code' => '1', 'city_name' => 'Ripon'],
            ['state_code' => '1', 'city_name' => 'Salford'],
            ['state_code' => '1', 'city_name' => 'Salisbury'],
            ['state_code' => '1', 'city_name' => 'Sheffield'],
            ['state_code' => '1', 'city_name' => 'Southampton'],
            ['state_code' => '1', 'city_name' => 'Southend-on-Sea'],
            ['state_code' => '1', 'city_name' => 'St Albans'],
            ['state_code' => '1', 'city_name' => 'Stoke on Trent'],
            ['state_code' => '1', 'city_name' => 'Sunderland'],
            ['state_code' => '1', 'city_name' => 'Truro'],
            ['state_code' => '1', 'city_name' => 'Wakefield'],
            ['state_code' => '1', 'city_name' => 'Wells'],
            ['state_code' => '1', 'city_name' => 'Westminster'],
            ['state_code' => '1', 'city_name' => 'Winchester'],
            ['state_code' => '1', 'city_name' => 'Wolverhampton'],
            ['state_code' => '1', 'city_name' => 'Worcester'],
            ['state_code' => '2', 'city_name' => 'Aberdeen'],
            ['state_code' => '2', 'city_name' => 'Dundee'],
            ['state_code' => '2', 'city_name' => 'Dunfermline'],
            ['state_code' => '2', 'city_name' => 'Edinburgh'],
            ['state_code' => '2', 'city_name' => 'Glasgow'],
            ['state_code' => '2', 'city_name' => 'Inverness'],
            ['state_code' => '2', 'city_name' => 'Perth'],
            ['state_code' => '2', 'city_name' => 'Stirling'],
            ['state_code' => '3', 'city_name' => 'Bangor'],
            ['state_code' => '3', 'city_name' => 'Cardiff'],
            ['state_code' => '3', 'city_name' => 'Newport'],
            ['state_code' => '3', 'city_name' => 'St Asaph'],
            ['state_code' => '3', 'city_name' => 'St Davids'],
            ['state_code' => '3', 'city_name' => 'Swansea'],
            ['state_code' => '3', 'city_name' => 'Wrexham'],
        ];

        DB::table('country_and_cities')->insert($countryAndcities);
    }
}
