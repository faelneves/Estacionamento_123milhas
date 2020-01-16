<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idProprietario');
            $table->unsignedBigInteger('idValor');
            $table->dateTime('entrada');
            $table->dateTime('saida')->nullable();
            $table->string('placa');
            $table->float('vrTotal')->nullable();
            $table->timestamps();

            $table->foreign('idProprietario')->references('id')->on('proprietarios')->onDelete('CASCADE');
            $table->foreign('idValor')->references('id')->on('valors')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcacaos');
    }
}
