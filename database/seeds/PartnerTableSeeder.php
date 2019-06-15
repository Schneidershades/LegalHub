<?php

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::Create([
        	'name'          	 			=> 'SIT Consulting',
        	'image'          				=> 'assets-visitors/images/sit.png',
            'url'                           => 'https://www.sitconsulting.org',
        ]);
    }
}
