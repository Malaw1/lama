<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsedReactifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_reactifs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('quatite');
            $table->unsignedInteger('analyse_id');
            $table->unsignedInteger('reactif_id');
            $table->foreign('analyse_id')->references('id')->on('analyses');
            $table->foreign('reactif_id')->references('id')->on('reactifs');
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
        Schema::dropIfExists('used_reactifs');
    }
}
