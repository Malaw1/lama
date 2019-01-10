<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionChromatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condition_chromatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('volume_injection');
            $table->string('longueur_onde');
            $table->integer('temperature');
            $table->string('debit');
            $table->string('detection');
            $table->string('colonne');
            $table->unsignedInteger('analyse_id');
            $table->foreign('analyse_id')->references('id')->on('analyses');
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
        Schema::dropIfExists('condition_chromatos');
    }
}
