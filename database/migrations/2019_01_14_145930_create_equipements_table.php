<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('code')->nullable();
            $table->string('appareil')->nullable();
            $table->string('fabricant')->nullable();
            $table->string('type')->nullable();
            $table->string('serie')->nullable();
            $table->date('date_installation')->nullable();
            $table->string('salle')->nullable();
            $table->string('etat')->nullable();
            $table->string('document_technique')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipements');
    }
}
