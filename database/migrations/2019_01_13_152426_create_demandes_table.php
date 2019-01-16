<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('molecule')->nullable();
            $table->date('date_demande')->nullable();
            $table->integer('client_id')->nullable();
            $table->text('description')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('demandes');
    }
}
