<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vizualizou extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visualizou', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_quiz')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('vezes')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('id_quiz')->references('id')->on('quiz');
            $table->foreign('id_user')->references('id')->on('users');
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
