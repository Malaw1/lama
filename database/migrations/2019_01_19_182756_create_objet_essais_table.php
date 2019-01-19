<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObjetEssaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objet_essais', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('code')->nullable();
            $table->string('forme_galenique')->nullable();
            $table->date('date_recue')->nullable();
            $table->string('quantite')->nullable();
            $table->string('lot')->nullable();
            $table->date('date_fab')->nullable();
            $table->date('date_exp')->nullable();
            $table->string('provenance')->nullable();
            $table->integer('fabricant')->nullable();
            $table->integer('demandeur')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('objet_essais');
    }
}
