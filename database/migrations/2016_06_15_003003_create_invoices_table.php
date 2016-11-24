<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->string('phase');
            $table->timestamp('deadline')->nullable();
            $table->string('description')->nullable();
            $table->decimal('ht_price')->nullable();
            $table->decimal('ttc_price')->nullable();
            $table->string('special_conditions')->nullable();
            $table->boolean('converted');
            $table->text('content_backup')->nullable();
            $table->text('content')->nullable();
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
        Schema::drop('invoices');
    }
}
