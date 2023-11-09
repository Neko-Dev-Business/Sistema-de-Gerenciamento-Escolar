<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EscolaTableSeeder::class);
        $this->call(DisciplinaSeeder::class);
        $this->call(TurmaTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(EnderecoTableSeeder::class);
        $this->call(NotaTableSeeder::class);
    }
}
