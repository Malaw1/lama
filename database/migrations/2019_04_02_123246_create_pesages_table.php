<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePesagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('poids_total')->nullable();
            $table->integer('poids_moyen')->nullable();
            $table->integer('tolerance')->nullable();
            $table->integer('ecart_type')->nullable();
            $table->string('uniformite_masse')->nullable();
            $table->integer('variation')->nullable();
            $table->integer('analyse_id')->nullable();
            $table->string('appareil')->nullable();
            $table->integer('user_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pesages');
    }
}
