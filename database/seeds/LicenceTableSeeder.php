<?php

use App\Licence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LicenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('licences')->delete();
        $statement = "ALTER TABLE licences AUTO_INCREMENT = 1;";
        DB::unprepared($statement);
        Schema::disableForeignKeyConstraints();

        Licence::create([
            'identifier' => 'trial',
            'name' => 'Essai',
            'description' => "Licence d'essai",
            'price' => '0',
            'users_number' => '2',
        ]);

        Licence::create([
            'identifier' => 'basic',
            'name' => 'Basique',
            'description' => 'Licence basique',
            'price' => '10',
            'users_number' => '5',
        ]);

        Licence::create([
            'identifier' => 'pro',
            'name' => 'Pro',
            'description' => 'Licence pro',
            'price' => '15',
            'users_number' => '10',
        ]);

    }
}
