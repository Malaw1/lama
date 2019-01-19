<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('designation')->nullable();
            $table->date('date_recep')->nullable();
            $table->string('depositaire')->nullable();
            $table->integer('unite_recue')->nullable();
            $table->string('quantite')->nullable();
            $table->string('fabricant')->nullable();
            $table->string('lot')->nullable();
            $table->date('date_fab')->nullable();
            $table->date('date_exp')->nullable();
            $table->string('catalog')->nullable();
            $table->string('cas')->nullable();
            $table->string('prix')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
