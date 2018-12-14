<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsRefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subs_refs', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('dateRecu');
            $table->string('nomProduit');
            $table->string('depositaire');
            $table->integer('qtRecu');
            $table->string('fabricant');
            $table->string('certificat');
            $table->string('lot');
            $table->date('dateFab');
            $table->date('dateExp');
            $table->datetime('type');
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
        Schema::dropIfExists('subs_refs');
    }
}
