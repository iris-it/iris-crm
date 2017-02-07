<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationProductsTaxesVat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function ($table) {
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
        Schema::table('products', function ($table) {
            $table->dropForeign('products_vat_id_foreign');
            $table->dropColumn('vat_id');
        });
    }
}
