<?php

use App\Office;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OfficeTableSeeder extends Seeder
{
    /**
     * Run the users seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->delete();
        $statement = "ALTER TABLE offices AUTO_INCREMENT = 1;";
        DB::unprepared($statement);
        Schema::disableForeignKeyConstraints();

        for ($i = 0; $i <= 3; $i++) {

            $faker = Faker\Factory::create('fr_FR');

            $office = Office::create([
                'name' => $faker->company,
                'website' => $faker->url,
                'activity_sector' => 'design',
                'workforce' => '10',
                'type' => $faker->companySuffix,
                'ape_number' => '4244Z',
                'siret_number' => $faker->siret,
                'phone_number' => '0102030405',
                'is_main' => true,
                'is_active' => true,
                'free_label' => $faker->text,
                'account_id' => $i
            ]);

            $address = \App\Address::create([
                'name' => $faker->company,
                'street_label' => $faker->streetAddress,
                'street_detail' => $faker->address,
                'zipcode' => $faker->postcode,
                'city' => $faker->city,
                'country' => $faker->country,
                'lat' => $faker->latitude,
                'lng' => $faker->longitude,
            ]);

            DB::table('addresses_offices_pivot')->insert([
                'type' => 'billing',
                'office_id' => $office->id,
                'address_id' => $address->id,
            ]);

            $address = \App\Address::create([
                'name' => $faker->company,
                'street_label' => $faker->streetAddress,
                'street_detail' => $faker->address,
                'zipcode' => $faker->postcode,
                'city' => $faker->city,
                'country' => $faker->country,
                'lat' => $faker->latitude,
                'lng' => $faker->longitude,
            ]);

            DB::table('addresses_offices_pivot')->insert([
                'type' => 'delivery',
                'office_id' => $office->id,
                'address_id' => $address->id,
            ]);

        }
    }
}
