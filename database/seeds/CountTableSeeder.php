<?php

use Illuminate\Database\Seeder;
use App\Models\Count;

class CountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Count::Create([
        	'title'              	=> 'Project Complete',
        	'count'              	=> '3444',
            'icon'                => 'ti-notepad',
        ]);

        Count::Create([
        	'title'              	=> 'Project Complete',
        	'count'              	=> '3444',
            'icon'                => 'ti-notepad',
        ]);

        Count::Create([
        	'title'              	=> 'Project Complete',
        	'count'              	=> '3444',
            'icon'                => 'ti-notepad',
        ]);

        Count::Create([
        	'title'              	=> 'Project Complete',
        	'count'              	=> '3444',
            'icon'                => 'ti-notepad',
        ]);
        
    }
}
