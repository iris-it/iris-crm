<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationEstablishmentsAddressesPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('establishments_addresses_pivot', function (Blueprint $table) {

            $table->string('type')->index();
            $table->integer('establishment_id')->unsigned()->index();
            $table->foreign('establishment_id')->references('id')->on('establishments')->onDelete('cascade');

            $table->integer('address_id')->unsigned()->index();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
