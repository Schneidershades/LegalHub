<?php

use Illuminate\Database\Seeder;
use App\Models\RoleDiscount;

class RoleDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleDiscount::Create([
            'role_id'          				=> 2,
            'item_id'          => 1,
            'percentage'          			=> 15,
        ]);
        
        RoleDiscount::Create([
        	'role_id'             				=> 2,
        	'item_id'          => 2,
        	'percentage'             		=> 15,
        ]);

        RoleDiscount::Create([
        	'role_id'             				=> 2,
        	'item_id'          => 3,
        	'percentage'             		=> 15,
        ]);

        RoleDiscount::Create([
        	'role_id'             				=> 2,
        	'item_id'          => 4,
        	'percentage'             		=> 15,
        ]);

        RoleDiscount::Create([
        	'role_id'             				=> 2,
        	'item_id'          => 5,
        	'percentage'             		=> 15,
        ]);

        RoleDiscount::Create([
        	'role_id'             				=> 2,
        	'item_id'          => 6,
        	'percentage'             		=> 15,
        ]);

        RoleDiscount::Create([
        	'role_id'             				=> 2,
        	'item_id'          => 7,
        	'percentage'             		=> 15,
        ]);

        RoleDiscount::Create([
        	'role_id'             				=> 2,
        	'item_id'          => 8,
        	'percentage'             		=> 15,
        ]);
    }
}


