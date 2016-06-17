<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationInvoicesQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function ($table) {
            $table->integer('quote_id')->after('special_conditions')->unsigned()->nullable()->index();
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
        Schema::table('invoices', function ($table) {
            $table->dropForeign('invoices_quote_id_foreign');
            $table->dropColumn('quote_id');
        });
    }
}
