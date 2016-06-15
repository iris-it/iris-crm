<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateprospectsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prospect_name');
            $table->string('website');
            $table->string('activity_sector');
            $table->integer('workforce');
            $table->string('type');
            $table->string('ape_number');
            $table->string('siret_number');
            $table->string('phone_number');
            $table->string('status');
            $table->string('account_owner');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');
            $table->string('free_label');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prospects');
    }
}
