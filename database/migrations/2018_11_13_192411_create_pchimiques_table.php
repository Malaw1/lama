<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePchimiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pchimiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formuleBrute');
            $table->string('momentDipolaire');
            $table->string('diametreMoleculaire');
            $table->string('masseMolaire');
            $table->integer('reactif_id');
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
        Schema::dropIfExists('pchimiques');
    }
}
