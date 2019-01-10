<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMethodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('methodes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('methode')->nullable();
            $table->integer('parametre_id')->nullable();
            $table->foreign('parametre_id')->references('id')->on('parametres');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('methodes');
    }
}
