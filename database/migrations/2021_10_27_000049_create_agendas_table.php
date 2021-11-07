<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->unsignedBigInteger('treinamento_id');
            $table->date('prazo')->nullable();
            $table->timestamps();

            //constraint
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('treinamento_id')->references('id')->on('treinamentos');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
