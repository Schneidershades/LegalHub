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
        	'phone_number_1'          	 => '+234(8)-028-974-982',
        	'phone_number_2'          	 => '+234(8)-028-974-982',
        	'email_1'          			 => 'legalhub.tech@gmail.com',
        	'email_2'           		 => 'info@legalhub.com.ng',
        	'address_1'           		 => 'No 38 Nasarawa avenue, War college, 3rd avenue, Gwarinpa.',
        	'address_2'           		 => 'No 38 Nasarawa avenue, War college, 3rd avenue, Gwarinpa.',
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
                                                Legal hub is legal firm with the speciality on various areas of law. The Firm is undoubtedly one of the top law firms in Nigeria. Our solicitors in Nigeria are highly experienced in the various aspects of law and strive to always secure good deals for clients both in and out of court. We offer quality and inexpensive legal services in Nigeria to both individuals and companies. <br>Legal hub offers various types of legal services. Some of our areas of legal practice and services include the followings

                                            </p>',
        	'about_description'			 => 'Finally legal hub offers legal services throughout Nigeria. The law firm also collaborates with other lawyers in various states of Nigeria to offer seamless services to various clients all over the country.',
        	'about_image'				 => 'assets-visitors/images/about.png',
        ]);

    }
}
