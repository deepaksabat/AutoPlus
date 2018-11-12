<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
          $table->increments('id');
          $table->string('photo')->unique()->nullable();
          $table->string('name');
          $table->string('email')->unique();
          $table->char('sex');
          $table->string('mobile')->unique();
          $table->string('phone')->nullable();
          $table->date('dob');
          $table->string('post');
          $table->text('address');
          $table->char('status');
          $table->date('join_date');
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
        Schema::dropIfExists('teams');
    }
}
