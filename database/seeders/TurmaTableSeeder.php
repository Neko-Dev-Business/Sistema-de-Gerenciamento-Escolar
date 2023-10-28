<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class TurmaTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turmas')->delete();

        $this->createNewTurma();
    }

    protected function createNewTurma()
    {

        $d = [

            [   'nomeTurma' => '1º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2021',
            ],

            [   'nomeTurma' => '2º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2021',
            ],

            [   'nomeTurma' => '3º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2021',
            ],

            [   'nomeTurma' => '4º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2021',
            ],

            [   'nomeTurma' => '1º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2022',
            ],

            [   'nomeTurma' => '2º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2022',
            ],

            [   'nomeTurma' => '3º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2022',
            ],

            [   'nomeTurma' => '4º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2022',
            ],

            [   'nomeTurma' => '1º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2023',
            ],

            [   'nomeTurma' => '2º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2023',
            ],

            [   'nomeTurma' => '3º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2023',
            ],

            [   'nomeTurma' => '4º Ano A',
                'turnoTurma' => 'Matutino',
                'anoLetivoTurma' => '2023',
            ],

            [   'nomeTurma' => '1º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2021',
            ],

            [   'nomeTurma' => '2º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2021',
            ],

            [   'nomeTurma' => '3º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2021',
            ],

            [   'nomeTurma' => '4º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2021',
            ],

            [   'nomeTurma' => '1º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2022',
            ],

            [   'nomeTurma' => '2º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2022',
            ],

            [   'nomeTurma' => '3º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2022',
            ],

            [   'nomeTurma' => '4º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2022',
            ],

            [   'nomeTurma' => '1º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2023',
            ],

            [   'nomeTurma' => '2º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2023',
            ],

            [   'nomeTurma' => '3º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2023',
            ],

            [   'nomeTurma' => '4º Ano B',
                'turnoTurma' => 'Vespertino',
                'anoLetivoTurma' => '2023',
            ],
        ];
        DB::table('turmas')->insert($d);
    }
}
