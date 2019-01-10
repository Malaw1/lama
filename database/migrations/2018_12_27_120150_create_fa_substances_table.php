<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaSubstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_substances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('faisabilite_id')->nullable();
            $table->foreign('faisabilite_id')->references('id')->on('faisabilites');
            $table->string('substance')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fa_substances');
    }
}
