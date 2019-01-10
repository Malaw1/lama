<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReactifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactifs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('designation')->nullable();
            $table->string('depositaire')->nullable();
            $table->integer('quantite')->nullable();
            $table->integer('fabricant')->nullable();
            $table->string('lot')->nullable();
            $table->string('conditionnement')->nullable();
            $table->string('catalog')->nullable();
            $table->string('cas')->nullable();
            $table->date('date_fab')->nullable();
            $table->decimal('date_exp')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reactifs');
    }
}
