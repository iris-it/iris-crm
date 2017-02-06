<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationServicesTaxesVat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function ($table) {
            $table->integer('vat_id')->after('description')->unsigned()->nullable()->index();
            $table->foreign('vat_id')->references('id')->on('taxes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function ($table) {
            $table->dropForeign('services_vat_id_foreign');
            $table->dropColumn('vat_id');
        });
    }
}
