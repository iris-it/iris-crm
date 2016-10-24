<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationQuotesOffices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotes', function ($table) {
            $table->integer('office_id')->after('content')->unsigned()->nullable()->index();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes', function ($table) {
            $table->dropForeign('quotes_office_id_foreign');
            $table->dropColumn('office_id');
        });
    }
}
