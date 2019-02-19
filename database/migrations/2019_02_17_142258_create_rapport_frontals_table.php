<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRapportFrontalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_frontals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('molecule')->nullable();
            $table->string('rf_inf_5')->nullable();
            $table->string('rf_inf_10')->nullable();
            $table->string('rf_sup_10')->nullable();
            $table->integer('screening')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rapport_frontals');
    }
}
