<?php

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::Create([
        	'user_id'              	=> 1,
        	'comment'              	=> 'LegalHub joined our proposal team and was on-board from start to finish. They were a fundamental part of the team and handled our every request with !',
        	'image'              	=> 'assets-visitors/img/testimonial-2.jpg',
        ]);

        Testimonial::Create([
        	'user_id'              	=> 1,
        	'comment'              	=> 'LegalHub joined our proposal team and was on-board from start to finish. They were a fundamental part of the team and handled our every request with !',
        	'image'              	=> 'assets-visitors/img/testimonial-1.jpg',
        ]);

        Testimonial::Create([
        	'user_id'              	=> 1,
        	'comment'              	=> 'LegalHub joined our proposal team and was on-board from start to finish. They were a fundamental part of the team and handled our every request with !',
        	'image'              	=> 'assets-visitors/img/testimonial-3.jpg',
        ]);

        Testimonial::Create([
        	'user_id'              	=> 1,
        	'comment'              	=> 'LegalHub joined our proposal team and was on-board from start to finish. They were a fundamental part of the team and handled our every request with !',
        	'image'              	=> 'assets-visitors/img/testimonial-2.jpg',
        ]);

    }
}
