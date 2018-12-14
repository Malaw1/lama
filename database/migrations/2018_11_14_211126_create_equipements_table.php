<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('appareil');
            $table->string('code');
            $table->string('fabricant')->nullable();
            $table->string('type');
            $table->string('serie');
            $table->string('societeContacter')->nullable();
            $table->date('dateInstallation');
            $table->string('etat');
            $table->string('documentTechDispo')->nullable();
            $table->string('salle');
            $table->string('commentaires')->nullable();
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
        Schema::dropIfExists('equipements');
    }
}
