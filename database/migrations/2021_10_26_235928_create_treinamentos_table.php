<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinamentos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 75);
            $table->text('descricao');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->date('validade')->nullable();
            $table->text('celulas');
            $table->text('anexo');
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
        Schema::dropIfExists('treinamento');
    }
}
