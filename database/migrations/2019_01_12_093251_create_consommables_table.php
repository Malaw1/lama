<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsommablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consommables', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('designation')->nullable();
            $table->string('type')->nullable();
            $table->string('fabricant')->nullable();
            $table->string('unite_recu')->nullable();
            $table->date('date_recue')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consommables');
    }
}
