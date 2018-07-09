<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarQuestoesERespostas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('perguntas', function (Blueprint $table) {
           $table->increments('id');
           $table->string('tituloPergunta');
       });
       Schema::create('respostas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idPergunta');
            $table->string('respostas');
            $table->foreign('idPergunta')->references('id')->on('perguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
