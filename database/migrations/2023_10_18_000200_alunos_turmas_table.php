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
        Schema::create('alunos_turmas', function (Blueprint $table) {
            $table->unsignedBigInteger('idPessoa');
            $table->unsignedBigInteger('idTurma');
            $table->foreign('idPessoa')->references('idPessoa')->on('pessoas')
            ->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('idTurma')->references('idTurma')->on('turmas')
            ->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('alunos_turmas');
    }
};
