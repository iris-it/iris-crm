<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationOrganizationsLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function ($table) {
            $table->integer('licence_id')->unsigned()->nullable()->index();
            $table->foreign('licence_id')->references('id')->on('licences')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function ($table) {
            $table->dropForeign('organizations_licence_id_foreign');
            $table->dropColumn('licence_id');
        });
    }
}