<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::Create([
        	'title'          	 			=> 'Welcome to LegalHub',
        	'description'          	 		=> 'Enhancing Customer Relationships via Technology Solutions',
        	'image'          				=> 'assets-visitors/images/bg/slide-1.jpg',
        ]);

        Slider::Create([
        	'title'          	 			=> 'Welcome to LegalHub',
        	'description'          	 		=> 'We help you reach the top and stay on top',
        	'image'          				=> 'assets-visitors/images/bg/slide-2.jpg',
        ]);

        Slider::Create([
            'title'                         => 'Welcome to LegalHub',
            'description'                   => 'We help you reach the top and stay on top',
            'image'                         => 'assets-visitors/images/bg/slide-3.jpg',
        ]);
    }
}
