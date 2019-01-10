<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaParaMethodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_para_methodes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('parametre')->nullable();
            $table->string('methode')->nullable();
            $table->integer('faisabilite_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fa_para_methodes');
    }
}
