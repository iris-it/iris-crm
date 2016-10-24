<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationAddressesOfficesPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses_offices_pivot', function (Blueprint $table) {

            $table->string('type')->index();
            $table->integer('office_id')->unsigned()->index();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');

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
