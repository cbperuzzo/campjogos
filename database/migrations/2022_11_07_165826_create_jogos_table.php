<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogos', function (Blueprint $table) {
            $table->unsignedBigInteger('camp');
            $table->unsignedBigInteger('time1');
            $table->unsignedBigInteger('time2');

            $table->id();
            $table->foreign('camp')->references('id')->on('campeonatos');
            $table->foreign('time1')->references('id')->on('times');
            $table->foreign('time2')->references('id')->on('times');
            $table->integer('t1pontos')->default(0);
            $table->integer('t2pontos')->default(0);
            $table->dateTime('dataHora');
            $table->integer('mddapx');
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
        Schema::dropIfExists('jogos');
    }
};
