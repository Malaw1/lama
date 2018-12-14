<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjetEssaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objet_essais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('designation');
            $table->string('formeGalenique');
            $table->string('fabricant');
            $table->date('dateRecue');
            $table->string('qtRecue');
            $table->string('lot');
            $table->date('dateFab');
            $table->date('dateExp');
            $table->integer('demande_id');
            $table->foreign('demande_id')->references('id')->on('demandes');
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
        Schema::dropIfExists('objet_essais');
    }
}
