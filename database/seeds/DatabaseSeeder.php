<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(LicenceTableSeeder::class);

        if (env('APP_ENV' !== 'production')) {
            $this->call(OrganizationTableSeeder::class);
            $this->call(AccountTableSeeder::class);
            $this->call(OfficeTableSeeder::class);
        }
    }
}
