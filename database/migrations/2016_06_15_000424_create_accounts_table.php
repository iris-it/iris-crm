<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('is_lead')->nullable();
            $table->boolean('converted')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations !
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}
