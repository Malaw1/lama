<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHplcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hplcs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('equipement')->nullable();
            $table->string('balance')->nullable();
            $table->string('pHmetre')->nullable();
            $table->integer('analyse_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hplcs');
    }
}
