<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::Create([
        	'phone_number_1'          	 => 1,
        	'phone_number_2'          	 => 1,
        	'email_1'          			 => 1,
        	'email_2'           		 => 1,
        	'address_1'           		 => 'USA, New York Mondella street 34, buld 8',
        	'address_2'           		 => 'USA, New York Mondella street 34, buld 8',
        	'city'           			 => 'Abuja',
        	'country'           		 => 'Nigeria',
        	'website'           		 => 'http://www.legalhub.com',
        	'state'           			 => 'Faster than the shadows',
        	'motto'						 => 'We Are Comitted To Support Till You See The Success',
        	'facebook'					 => 'no',
        	'twitter'					 => 'no',
        	'linkedin'					 => 'no',
        	'pinterest'					 => 'no',
        	'googleplus'				 => 'no',
        	'instagram'					 => 'no',
        	'home_description'			 => '<p>
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae inventore error earum consequatur, 
                                                aperiam voluptatem voluptate nisi commodi, amet corrupti, est cumque ex assumenda saepe dicta quam animi reprehenderit impedit?<br>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit possimus labore ad! Illo tempora, 
                                                nam blanditiis necessitatibus autem dolor? Ea magnam quia officiis necessitatibus aut numquam dignissimos sequi provident unde!
                                            </p>',
        	'about_description'			 => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
        	'about_image'				 => 'assets-visitors/images/about.png',
        ]);

    }
}
