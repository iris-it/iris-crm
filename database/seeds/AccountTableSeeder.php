<?php

use App\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the users seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->delete();
        $statement = "ALTER TABLE accounts AUTO_INCREMENT = 1;";
        DB::unprepared($statement);
        Schema::disableForeignKeyConstraints();

        $faker = Faker\Factory::create('fr_FR');

        Account::create([
            'name' => 'Account LTD',
            'website' => $faker->url,
            'logo' => 'images/default/logo.png',
            'is_lead' => false,
            'converted' => false,
            'organization_id' => 1,
        ]);

        Account::create([
            'name' => 'AccountConverted LTD',
            'website' => $faker->url,
            'logo' => 'images/default/logo.png',
            'is_lead' => false,
            'converted' => true,
            'organization_id' => 1,
        ]);

        Account::create([
            'name' => 'Lead LTD',
            'website' => $faker->url,
            'logo' => 'images/default/logo.png',
            'is_lead' => true,
            'converted' => false,
            'organization_id' => 1,
        ]);

    }
}
