<?php

use Illuminate\Support\Facades\Schema;
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

            $table->integer('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('provincias');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->string('username', 50)->unique();
            $table->tinyInteger('age');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('identification_document', 30);
            $table->text('address', 150);
            $table->string('phone_mobile');
            $table->string('phone_house');
            $table->enum('sex', ['male', 'female']);
            $table->string('nationality');
            $table->string('occupation');
            $table->enum('civil_status', ['single', 'married', 'divorced', 'widowe']);

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
        Schema::dropIfExists('users');
    }
}
