<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
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
            $table->decimal('ht_price')->nullable();
            $table->decimal('ttc_price')->nullable();
            $table->integer('stock_disponibility');
            $table->string('product_avatar')->nullable();
            $table->timestamp('sale_datestart')->nullable();
            $table->timestamp('sale_dateend')->nullable();
            $table->string('product_notice')->nullable();
            $table->string('description')->nullable();
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
