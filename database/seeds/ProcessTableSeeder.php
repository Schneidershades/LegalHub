<?php

use Illuminate\Database\Seeder;
use App\Models\Process;

class ProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Process::Create([
        	'number'              	=> '01',
        	'title'              	=> 'Analyzing',
        	'description'           => ' We had a great experience using Brands are Boring\'s naming service. The names were spot-on, an indulgence ',        
        ]);

        Process::Create([
        	'number'              	=> '02',
        	'title'              	=> 'Designing',
        	'description'           => ' We had a great experience using Brands are Boring\'s naming service. The names were spot-on, an indulgence ',        
        ]);

        Process::Create([
        	'number'              	=> '03',
        	'title'              	=> 'Developing',
        	'description'           => ' We had a great experience using Brands are Boring\'s naming service. The names were spot-on, an indulgence ',        
        ]);

        Process::Create([
        	'number'              	=> '04',
        	'title'              	=> 'Launching',
        	'description'           => ' We had a great experience using Brands are Boring\'s naming service. The names were spot-on, an indulgence ',        
        ]);
    }
}
