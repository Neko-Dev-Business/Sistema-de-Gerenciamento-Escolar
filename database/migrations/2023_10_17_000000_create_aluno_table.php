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
        Schema::create('aluno', function (Blueprint $table) {
            $table->id('idAluno');
            $table->date('dtMatriculaAluno');
            $table->date('dtDesligamentoAluno')->nullable(true);
            $table->unsignedBigInteger('idPessoa');
            $table->foreign('idPessoa')->references('idPessoa')->on('pessoa')
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
        Schema::dropIfExists('aluno');
    }
};
