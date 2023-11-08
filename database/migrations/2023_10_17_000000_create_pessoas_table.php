<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\Qs;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('idPessoa');
            $table->string('nomePessoa');
            $table->char('tipoPessoa', 1);
            $table->char('cpfPessoa', 14)->nullable();
            $table->char('dataNascimentoPessoa', 10)->nullable();
            $table->char('rgPessoa', 11)->nullable();
            $table->char('cnpjPessoa', 18)->nullable();
            $table->char('generoPessoa', 1);
            $table->string('nacionalidadePessoa', 30)->nullable();
            $table->string('nomeMaePessoa')->nullable();
            $table->string('nomePaiPessoa')->nullable();
            $table->string('telefonePessoa', 20)->nullable();
            $table->string('emailPessoa', 50);
            $table->string('usuarioPessoa', 50);
            $table->char('tipoUsuario', 1);
            $table->string('foto')->default(Qs::getDefaultUserImage());
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('pessoas');
    }
};
