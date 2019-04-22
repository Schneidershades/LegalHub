<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::Create([
        	'user_id'              	=> 1,
        	'title'              	=> 'Business',
        	'excerpt'              	=> 'Business',
        	'body'              	=> 'Business',
        	'image'              	=> NULL,
        	'meta_description'   	=> NULL,
        	'meta_keyword'          => NULL,
        	'status'              	=> 'active',
        	'slug'              	=> str_slug('Business'),
        ]);

        Page::Create([
        	'user_id'              	=> 1,
        	'title'              	=> 'Business',
        	'excerpt'              	=> 'Business',
        	'body'              	=> 'Business',
        	'image'              	=> NULL,
        	'meta_description'   	=> NULL,
        	'meta_keyword'          => NULL,
        	'status'              	=> 'active',
        	'slug'              	=> str_slug('de'),
        ]);

        Page::Create([
        	'user_id'              	=> 1,
        	'title'              	=> 'Business',
        	'excerpt'              	=> 'Business',
        	'body'              	=> 'Business',
        	'image'              	=> NULL,
        	'meta_description'   	=> NULL,
        	'meta_keyword'          => NULL,
        	'status'              	=> 'active',
        	'slug'              	=> str_slug('ee'),
        ]);

        Page::Create([
        	'user_id'              	=> 1,
        	'title'              	=> 'Business',
        	'excerpt'              	=> 'Business',
        	'body'              	=> 'Business',
        	'image'              	=> NULL,
        	'meta_description'   	=> NULL,
        	'meta_keyword'          => NULL,
        	'status'              	=> 'active',
        	'slug'              	=> str_slug('de'),
        ]);
    }
}
