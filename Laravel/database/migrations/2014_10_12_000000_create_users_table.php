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
            $table->string('photo')->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('sex')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile')->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->char('role')->nullable();
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
