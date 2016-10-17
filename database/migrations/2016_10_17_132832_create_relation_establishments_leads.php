<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationEstablishmentsLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('establishments', function ($table) {
            $table->integer('lead_id')->after('account_id')->unsigned()->index();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('establishments', function ($table) {
            $table->dropForeign('establishments_lead_id_foreign');
            $table->dropColumn('lead_id');
        });
    }
}
