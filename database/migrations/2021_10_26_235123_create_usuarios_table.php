<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('login', 50)->unique();
            $table->string('senha', 15);
            $table->integer('cadastro')->unique();
            $table->string('nome', 70);
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('area_id');
            $table->char('tipo', 1)->default('a'); // Constante
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
        Schema::dropIfExists('usuario');
    }
}
