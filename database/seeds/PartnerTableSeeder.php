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
        	'name'          	 			=> 'Welcome to LegalHub',
        	'image'          				=> 'assets-visitors/images/themeforest.png',
        ]);

        Partner::Create([
        	'name'          	 			=> 'Welcome to LegalHub',
        	'image'          				=> 'assets-visitors/images/codecanyon.png',
        ]);

        Partner::Create([
        	'name'          	 			=> 'Welcome to LegalHub',
        	'image'          				=> 'assets-visitors/images/audiojungle.png',
        ]);

        Partner::Create([
        	'name'          	 			=> 'Welcome to LegalHub',
        	'image'          				=> 'assets-visitors/images/graphicriver.png',
        ]);
    }
}
