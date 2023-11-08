<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolasTable extends Migration
{
    public function up()
    {
        Schema::create('escolas', function (Blueprint $table) {
            $table->id();
            $table->string('nomeEscola');
            $table->string('secretariaEscola');
            $table->string('diretoraEscola');
            $table->text('enderecoEscola');
            $table->string('assinaturaDiretoraEscola');
            $table->string('telefoneEscola');
            $table->string('emailEscola');
            $table->string('cnpjEscola')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('escolas');
    }
}
