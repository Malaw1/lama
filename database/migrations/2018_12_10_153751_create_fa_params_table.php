<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_params', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parametre');
            $table->unsignedInteger('faisabilite_id');
            $table->foreign('faisabilite_id')->references('id')->on('faisabilites');
            $table->timestamps();
        });

        Schema::create('fa_methodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('methode');
            $table->unsignedInteger('faisabilite_id');
            $table->foreign('faisabilite_id')->references('id')->on('faisabilites');
            $table->timestamps();
        });

        Schema::create('fa_materiels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('materiel');
            $table->unsignedInteger('faisabilite_id');
            $table->foreign('faisabilite_id')->references('id')->on('faisabilites');
            $table->timestamps();
        });

        Schema::create('fa_equipements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appareil');
            $table->unsignedInteger('faisabilite_id');
            $table->foreign('faisabilite_id')->references('id')->on('faisabilites');
            $table->timestamps();
        });

        Schema::create('fa_personels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('personel');
            $table->unsignedInteger('faisabilite_id');
            $table->foreign('faisabilite_id')->references('id')->on('faisabilites');
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
        Schema::dropIfExists('fa_param');
    }
}
