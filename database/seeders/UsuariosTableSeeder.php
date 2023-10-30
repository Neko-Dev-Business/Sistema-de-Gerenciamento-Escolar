<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;
use App\Models\Pessoa;

class UsuariosTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pessoas')->delete();

        $this->createNewUsers();
        Pessoa::factory()->count(25)->create();
    }

    protected function createNewUsers()
    {
        $password = Hash::make('root'); // Default user password

        $d = [

            [   'nomePessoa' => 'Gabriel',
                'tipoPessoa' => 'F',
                'cpfPessoa' => '07934110502',
                'dataNascimentoPessoa' => '20000527',
                'rgPessoa' => '2164314553',
                'generoPessoa' => 'M',
                'nacionalidadePessoa' => 'Brasileiro',
                'nomeMaePessoa' => 'Maria Aparecida Ribeiro Alves',
                'nomePaiPessoa' => 'José Carlos de Oliveira',
                'telefonePessoa' => '75988497771',
                'emailPessoa' => 'gabriel@sysedu.com',
                'usuarioPessoa' => 'gabrieloliveira',
                'tipoUsuario' => '5',
                'foto' => 'http://localhost/images/usuarios/perfil.png',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],
        ];
        DB::table('pessoas')->insert($d);
    }
}


