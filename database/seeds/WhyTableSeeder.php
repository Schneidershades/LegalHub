<?php

use Illuminate\Database\Seeder;
use App\Models\Why;

class WhyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Why::Create([
        	'image'              => 'assets-visitors/icons/icon-text-1.svg',
        	'title'              => 'Quality and Trust',
        	'description'              => 'We constantly seek new ways to increase client visibility and brand value. We also look to get the most ...',
        ]);

        Why::Create([
        	'image'              => 'assets-visitors/icons/icon-text-3.svg',
        	'title'              => 'Creative and innovative solutions',
        	'description'              => 'We constantly seek new ways to increase client visibility and brand value. We also look to get the most ...',
        ]);

        Why::Create([
        	'image'              => 'assets-visitors/icons/icon-text-4.svg',
        	'title'              => 'Trasparency and ease of work',
        	'description'              => 'We constantly seek new ways to increase client visibility and brand value. We also look to get the most ...',
        ]);


        Why::Create([
        	'image'              => 'assets-visitors/icons/icon-text-2.svg',
        	'title'              => '24-hour customer service',
        	'description'              => 'We constantly seek new ways to increase client visibility and brand value. We also look to get the most ...',
        ]);

    }
}
