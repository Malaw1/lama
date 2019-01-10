<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaisabilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faisabilites', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('reference')->nullable();
            $table->integer('objet_essai')->nullable();
            $table->string('molecule')->nullable();
            $table->foreign('objet_essai')->references('id')->on('objet_essais');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('faisabilites');
    }
}
