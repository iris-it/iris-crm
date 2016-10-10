<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('address_comp')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('status');
            $table->string('siren_number')->nullable();
            $table->string('siret_number')->unique();
            $table->string('tva_number')->nullable();
            $table->string('ape_number');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organizations');
    }
}
