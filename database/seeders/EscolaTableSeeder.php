<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class EscolaTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escolas')->delete();

        $this->createNewUsers();
    }

    protected function createNewUsers()
    {

        $d = [

            [   'nomeEscola' => 'ESCOLA MUNICIPAL DE CARAVELA DO SUL',
                'secretariaEscola' => 'JUCILEIDE MARIA DA SILVA',
                'diretoraEscola' => 'CARLOS JOSE DE ANDRADE',
		        'enderecoEscola' => 'RUA DAS CARAVELAS N° 15, CENTRO',
		        'assinaturaDiretoraEscola' => 'carlos jose',
		        'telefoneEscola' => '(75)98835-8406',
		        'emailEscola' => 'CARAVELA@ESCOLA.COM',
		        'cnpjEscola' => '90.782.217/0001-93',
            ],
        ];
        DB::table('escolas')->insert($d);
    }
}