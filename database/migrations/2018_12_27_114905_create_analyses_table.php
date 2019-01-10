<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('code')->nullable();
            $table->integer('objet_essai')->nullable();
            $table->string('reference')->nullable();
            $table->string('dci')->nullable();
            $table->string('dosage')->nullable();
            $table->string('etat')->nullable();
            $table->integer('responsable')->nullable();
            $table->foreign('objet_essai')->references('id')->on('objet_essais');
            $table->foreign('responsable')->references('id')->on('users');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('analyses');
    }
}
