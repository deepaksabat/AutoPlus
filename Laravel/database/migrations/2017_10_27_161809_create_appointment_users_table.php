<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('appointment_users', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->integer('appointment_id')->unsigned();
             $table->string('discount')->nullable();
             $table->string('advance')->nullable();
             $table->integer('payment_method_id')->nullable();
             $table->string('remark')->nullable();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
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
        Schema::dropIfExists('appointment_users');
    }
}
