<?php

use Illuminate\Database\Seeder;
use App\Models\RegistrationItem;

class RegistrationItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegistrationItem::Create([
        	'user_id'           => 1,
        	'item_id'           => 1,
        	'amount'           	=> 15000,
        	'flexible'			=> 'no',
        	'flexible_amount'	=> 'no',
        	'flexible_state'	=> 'no',
        ]);

        // private
        RegistrationItem::Create([
        	'user_id'           => 1,
        	'item_id'           => 2,
        	'amount'           	=> 45000,
        	'flexible'			=> 'yes',
        	'flexible_amount'	=> 15000,
        	'flexible_state'	=> 1000000,
        ]);


        // public
        RegistrationItem::Create([
            'user_id'           => 1,
            'item_id'           => 3,
            'amount'            => 50000,
            'flexible'          => 'yes',
            'flexible_amount'   => 20000,
            'flexible_state'    => 1000000,
        ]);

        // guarantee
        RegistrationItem::Create([
            'user_id'           => 1,
            'item_id'           => 4,
            'amount'            => 180000,
            'flexible'          => 'no',
            'flexible_amount'   => 0,
            'flexible_state'    => 0,
        ]);

        // trademark

        RegistrationItem::Create([
            'user_id'           => 1,
            'item_id'           => 5,
            'amount'            => 100000,
            'flexible'          => 'no',
            'flexible_amount'   => 'no',
            'flexible_state'    => 'no',
        ]);

        // copyright

        RegistrationItem::Create([
            'user_id'           => 1,
            'item_id'           => 6,
            'amount'            => 35000,
            'flexible'          => 'no',
            'flexible_amount'   => 'no',
            'flexible_state'    => 'no',
        ]);

        // patent
        RegistrationItem::Create([
            'user_id'           => 1,
            'item_id'           => 7,
            'amount'            => 95000,
            'flexible'          => 'no',
            'flexible_amount'   => 'no',
            'flexible_state'    => 'no',
        ]);

        // ngo
        RegistrationItem::Create([
            'user_id'           => 1,
            'item_id'           => 8,
            'amount'            => 95000,
            'flexible'          => 'no',
            'flexible_amount'   => 'no',
            'flexible_state'    => 'no',
        ]);
    }

}
