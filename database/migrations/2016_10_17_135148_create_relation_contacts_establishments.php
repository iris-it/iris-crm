<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationContactsEstablishments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function ($table) {
            $table->integer('establishment_id')->after('type')->unsigned()->nullable()->index();
            $table->foreign('establishment_id')->references('id')->on('establishments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function ($table) {
            $table->dropForeign('contacts_establishment_id_foreign');
            $table->dropColumn('establishment_id');
        });
    }
}
