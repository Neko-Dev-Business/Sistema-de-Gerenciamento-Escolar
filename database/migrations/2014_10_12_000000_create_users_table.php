<?php

use App\Helpers\Qs;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 100)->unique()->nullable();
            $table->string('code', 100)->unique();
            $table->string('username', 100)->nullable()->unique();
            $table->string('user_type');
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('foto')->default(Qs::getDefaultUserImage());
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('endereço')->nullable();
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
        Schema::dropIfExists('users');
    }
};
