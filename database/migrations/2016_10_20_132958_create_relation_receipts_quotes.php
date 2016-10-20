<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationReceiptsQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('receipts', function ($table) {
            $table->integer('quote_id')->after('content')->unsigned()->nullable()->index();
            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipts', function ($table) {
            $table->dropForeign('receipts_quote_id_foreign');
            $table->dropColumn('quote_id');
        });
    }
}
