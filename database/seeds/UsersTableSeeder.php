<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
        	'name'              => 'Schneider',
        	'email'              => 'admin@admin.com',
        	'password'              => bcrypt('password'),
            'role_id'              => 1,
        ]);
    }
}
