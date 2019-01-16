<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProduitChimiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_chimiques', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('designation')->nullable();
            $table->date('date_recep')->nullable();
            $table->string('depositaire')->nullable();
            $table->integer('unite_recu')->nullable();
            $table->string('quantite')->nullable();
            $table->string('fabricant')->nullable();
            $table->string('lot')->nullable();
            $table->date('date_fab')->nullable();
            $table->date('date_exp')->nullable();
            $table->string('catalog')->nullable();
            $table->string('cas')->nullable();
            $table->integer('prix')->nullable();
            $table->string('type')->nullable();
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produit_chimiques');
    }
}
