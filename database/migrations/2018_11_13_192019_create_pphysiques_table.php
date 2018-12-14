<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePphysiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pphysiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tempFusion');
            $table->string('tempEbulution');
            $table->string('solubilite');
            $table->string('parametreDeSolubilite');
            $table->string('masseVolumique');
            $table->string('tempAutoInflamation');
            $table->string('limitesExplosiviteAir');
            $table->string('pressionVapeurSaturante');
            $table->string('ViscositeDynamique');
            $table->string('pointCritique');
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
        Schema::dropIfExists('pphysiques');
    }
}
