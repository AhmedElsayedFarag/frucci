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
         $this->call(adminSeederAndRole::class);
         $this->call(SettingsTableSeeder::class);
    }
}
