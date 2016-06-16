<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateproductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->boolean('is_active');
            $table->string('category');
            $table->decimal('ht_price');
            $table->decimal('ttc_price');
            $table->string('manutention_officer');
            $table->integer('stock_disponibility');
            $table->string('product_avatar');
            $table->timestamp('sale_datestart');
            $table->timestamp('sale_dateend');
            $table->string('product_notice');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
