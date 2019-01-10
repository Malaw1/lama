<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpectroUvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spectro_uvs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('equipement')->nullable();
            $table->string('longueure_onde')->nullable();
            $table->string('blanc')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('ph')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('spectro_uvs');
    }
}
