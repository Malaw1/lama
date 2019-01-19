<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('substances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('designation')->nullable();
            $table->date('date_recue')->nullable();
            $table->string('depositaire')->nullable();
            $table->integer('unite_recue')->nullable();
            $table->string('quantite')->nullable();
            $table->string('fabricant')->nullable();
            $table->string('lot')->nullable();
            $table->date('date_fab')->nullable();
            $table->date('date_exp')->nullable();
            $table->string('catalog')->nullable();
            $table->string('cas')->nullable();
            $table->integer('prix')->nullable();
            $table->integer('user_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('substances');
    }
}
