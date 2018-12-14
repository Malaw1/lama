<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactifs', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('dateRecu');
            $table->string('nomProduit');
            $table->string('depositaire');
            $table->integer('qtRecu');
            $table->string('fabricant');
            $table->string('conditionnement');
            $table->string('lot');
            $table->date('dateFab');
            $table->date('expDate');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('reactifs');
    }
}
