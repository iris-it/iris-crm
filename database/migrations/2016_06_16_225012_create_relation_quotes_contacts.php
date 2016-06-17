<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationQuotesContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotes', function ($table) {
            $table->integer('contact_id')->after('phase')->unsigned()->nullable()->index();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('set null');
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
            $table->dropForeign('quotes_contact_id_foreign');
            $table->dropColumn('contact_id');
        });
    }
}
