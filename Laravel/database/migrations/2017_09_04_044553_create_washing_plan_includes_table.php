<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWashingPlanIncludesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('washing_plan_includes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('washing_plan_id')->unsigned();
          $table->string('washing_plan_include');
          $table->foreign('washing_plan_id')->references('id')->on('washing_plans')->onDelete('cascade');
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
        Schema::dropIfExists('washing_plan_includes');
    }
}
