<?php

use App\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the users seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->delete();
        $statement = "ALTER TABLE organizations AUTO_INCREMENT = 1;";
        DB::unprepared($statement);
        Schema::disableForeignKeyConstraints();

        $faker = Faker\Factory::create('fr_FR');

        Organization::create([
            'uuid' => '084bfedb-4aba-481c-b01f-8f3f822298c1',
            'name' => $faker->company,
            'address' => $faker->address,
            'address_comp' => $faker->streetAddress,
            'phone' => $faker->phoneNumber,
            'email' => $faker->companyEmail,
            'website' => $faker->url,
            'is_active' => 1,
            'status' => $faker->companySuffix,
            'siret_number' => $faker->siret,
            'siren_number' => $faker->siren,
            'vat_number' => 'FR00001002020',
            'ape_number' => '1337D',
            'owner_id' => 1
        ]);
        
    }
}
