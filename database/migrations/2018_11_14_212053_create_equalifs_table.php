<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEqualifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equalifs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateQualification');
            $table->date('nextQualification');
            $table->string('equipement_id');
            $table->foreign('equipement_id')->references('id')->on('equipements');
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
        Schema::dropIfExists('equalifs');
    }
}
