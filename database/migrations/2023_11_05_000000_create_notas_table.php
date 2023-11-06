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
        Schema::create('notas', function (Blueprint $table) {
            $table->id('idNota');
            $table->float('primeiraNota');
            $table->float('segundaNota');
            $table->float('terceiraNota');
            $table->float('quartaNota');
            $table->float('primeiraRecuperacao')->nullable();
            $table->float('segundaRecuperacao')->nullable();
            $table->float('terceiraRecuperacao')->nullable();
            $table->float('quartaRecuperacao')->nullable();
            $table->unsignedTinyInteger('unidade');
            $table->unsignedBigInteger('idPessoa');
            $table->unsignedBigInteger('idDisciplina');
            $table->unsignedBigInteger('idTurma');
            //$table->foreign('idPessoa')->references('idPessoa')->on('pessoas')->where('tipoUsuario', 1);
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
        Schema::dropIfExists('notas');
    }
};
