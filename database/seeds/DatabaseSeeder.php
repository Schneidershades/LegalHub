<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ItemTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RegistrationItemTableSeeder::class);
        $this->call(FAQTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(TestimonialTableSeeder::class);
        $this->call(WhyTableSeeder::class);
        $this->call(ProcessTableSeeder::class);
        $this->call(PartnerTableSeeder::class);
        $this->call(CountTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RoleDiscountSeeder::class);
    }
}
