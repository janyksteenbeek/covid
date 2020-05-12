<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->date('date')->index();
            $table->string('country_code')->index();
            $table->unsignedInteger('new_cases');
            $table->unsignedInteger('new_deaths');
            $table->unsignedInteger('total_cases');
            $table->unsignedInteger('total_recoveries');
            $table->unsignedInteger('total_deaths');
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
        Schema::dropIfExists('statistics');
    }
}
