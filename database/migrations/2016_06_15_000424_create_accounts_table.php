<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateaccountsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('website');
            $table->string('activity_sector');
            $table->integer('workforce');
            $table->string('type');
            $table->string('ape_number');
            $table->string('siret_number');
            $table->string('phone_number');
            $table->boolean('is_active');
            $table->boolean('converted');
            $table->string('billing_address');
            $table->string('delivery_address');
            $table->string('billing_zipcode');
            $table->string('delivery_zipcode');
            $table->string('billing_city');
            $table->string('delivery_city');
            $table->string('billing_country');
            $table->string('delivery_country');
            $table->string('free_label');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations !
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}
