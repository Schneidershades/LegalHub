<?php

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::Create([
        	'name'                     => 'Business',
            'description'              => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'range'                    => 'per business',
        	'slug'                     => str_slug('Business'),
        ]);

        Item::Create([
        	'name'                     => 'Private Limited Company',
            'description'              => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'range'                    => 'per 1Million Shares',
        	'slug'                     => str_slug('Private Limited Company'),
        ]);

        Item::Create([
        	'name'                     => 'Public Limited Company',
            'description'              => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'range'                    => 'per 1Million Shares',
        	'slug'                     => str_slug('Public Limited Company'),
        ]);

        Item::Create([
            'name'                      => 'Company Limited by Guarantee',
            'description'               => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'range'                     => 'per business',
            'slug'                      => str_slug('Company Limited by Guarantee'),
        ]);

        Item::Create([
        	'name'                     => 'Trademark',
            'description'              => 'Trademark',
            'range'                    => 'per Initial',
        	'slug'                     => str_slug('Trademark'),
        ]);

        Item::Create([
        	'name'                     => 'Copyright',
            'description'              => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'range'                    => 'per Initial',
        	'slug'                     => str_slug('Copyright'),
        ]);

        Item::Create([
        	'name'                     => 'Patent',
            'description'              => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'range'                    => 'per Patent',
        	'slug'                     => str_slug('Patent'),
        ]);

        Item::Create([
        	'name'                     => 'NGO',
            'description'              => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'range'                    => 'per NGO',
        	'slug'                     => str_slug('NGO'),
        ]);
    }
}
