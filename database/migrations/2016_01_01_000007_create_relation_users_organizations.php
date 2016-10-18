<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationUsersOrganizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('organizations', function ($table) {
            $table->integer('owner_id')->unsigned()->nullable()->index();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('users', function ($table) {
            $table->integer('organization_id')->unsigned()->nullable()->index();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('set null');
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
            $table->dropForeign('organizations_owner_id_foreign');
            $table->dropColumn('owner_id');
        });

        Schema::table('users', function ($table) {
            $table->dropForeign('users_organization_id_foreign');
            $table->dropColumn('organization_id');
        });
    }
}