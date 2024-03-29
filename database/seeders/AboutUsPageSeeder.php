<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about_page_content = [
            'page_headline' => "At Installs Direct, we're more than just a solar panel installation company – we're your partner in the journey towards sustainable energy.",
            'side_content' => "Join the Solar Revolution and
            Save the Planet
            At Installs Direct, we're more than just a solar panel installation company – we're your partner in the journey towards sustainable energy. Founded on the principles of innovation, quality, and environmental stewardship, we are committed to providing top-tier solar solutions that empower homes and businesses to harness the power of the sun.

            Our mission is clear: to accelerate the adoption of solar energy by delivering reliable, cost-effective, and environmentally friendly solutions. We believe in a future where clean energy is accessible to everyone, and we work tirelessly to make that vision a reality

            Mi incident elit, id bisque Caligula ac diam, amet. Vel Letitia suspendisse morbid effendi faucibus eget vestibulum felis. Dictum quis motes, sit sit. Tell's aliquam enim urna, etiam. Mauris posuere amputate arcu amet, vitae nisi, tellus tincidunt. At feugiat sapien varius id.

            Eget quis mi enim, leo lacinia pharetra, semper. Eget in volutpat mollis at volutpat lectus velit, sed auctor. Porttitor fames arcu quis fusce augue enim. Quis at habitant diam at. Suscipit tristique risus, at donec. In turpis vel et quam imperdiet. Ipsum molestie aliquet sodales id est ac volutpat. .

            ",
        ];

        DB::table('about_us_pages')->insert($about_page_content);
    }
}
