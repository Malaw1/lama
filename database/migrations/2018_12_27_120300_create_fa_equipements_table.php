<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaEquipementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_equipements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('faisabilite_id')->nullable();
            $table->string('equipement')->nullable();
            $table->foreign('faisabilite_id')->references('id')->on('faisabilites');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fa_equipements');
    }
}