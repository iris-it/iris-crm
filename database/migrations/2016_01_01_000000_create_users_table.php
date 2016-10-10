<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub');
            $table->string('name');
            $table->string('preferred_username');
            $table->string('given_name');
            $table->string('family_name');
            $table->string('email');
            $table->string('resource_access')->nullable();
            $table->longText('settings')->nullable();
            $table->integer('organization_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
