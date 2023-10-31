<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class DisciplinaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplinas')->delete();

        $this->createNewUsers();
    }

    protected function createNewUsers()
    {

        $d = [

            [   'codigoDisciplina' => 'EFI01',
                'nomeDisciplina' => 'Português',
                'cargaHorariaDisciplina' => '40',
            ],
            [   'codigoDisciplina' => 'EFI02',
                'nomeDisciplina' => 'Matemática',
                'cargaHorariaDisciplina' => '40',
            ],
            [   'codigoDisciplina' => 'EFI03',
                'nomeDisciplina' => 'Geografia',
                'cargaHorariaDisciplina' => '30',
            ],
            [   'codigoDisciplina' => 'EFI04',
                'nomeDisciplina' => 'História',
                'cargaHorariaDisciplina' => '30',
            ],
            [   'codigoDisciplina' => 'EFI05',
                'nomeDisciplina' => 'Ciências',
                'cargaHorariaDisciplina' => '30',
            ],
            [   'codigoDisciplina' => 'EFI06',
                'nomeDisciplina' => 'Artes',
                'cargaHorariaDisciplina' => '05',
            ],
            [   'codigoDisciplina' => 'EFI07',
                'nomeDisciplina' => 'Religião',
                'cargaHorariaDisciplina' => '05',
            ],
            [   'codigoDisciplina' => 'EFII01',
                'nomeDisciplina' => 'Química',
                'cargaHorariaDisciplina' => '15',
            ],
            [   'codigoDisciplina' => 'EFII02',
                'nomeDisciplina' => 'Física',
                'cargaHorariaDisciplina' => '15',
            ],
            [   'codigoDisciplina' => 'EFI08',
                'nomeDisciplina' => 'Redação',
                'cargaHorariaDisciplina' => '10',
            ],
            [   'codigoDisciplina' => 'EFI09',
                'nomeDisciplina' => 'Educação Física',
                'cargaHorariaDisciplina' => '10',
            ],
            [   'codigoDisciplina' => 'EFI10',
                'nomeDisciplina' => 'Inglês',
                'cargaHorariaDisciplina' => '20',
            ],
            [   'codigoDisciplina' => 'EFI11',
                'nomeDisciplina' => 'Espanhol',
                'cargaHorariaDisciplina' => '20',
            ],
            [   'codigoDisciplina' => 'DIV01',
                'nomeDisciplina' => 'Teatro',
                'cargaHorariaDisciplina' => '03',
            ],
            [   'codigoDisciplina' => 'DIV02',
                'nomeDisciplina' => 'Música',
                'cargaHorariaDisciplina' => '03',
            ],
            [   'codigoDisciplina' => 'EFII03',
                'nomeDisciplina' => 'Filosofia',
                'cargaHorariaDisciplina' => '20',
            ],
            [   'codigoDisciplina' => 'EFII04',
                'nomeDisciplina' => 'Sociologia',
                'cargaHorariaDisciplina' => '20',
            ],
            [   'codigoDisciplina' => 'DIV03',
                'nomeDisciplina' => 'Educação Financeira',
                'cargaHorariaDisciplina' => '03',
            ],
            [   'codigoDisciplina' => 'EI01',
                'nomeDisciplina' => 'Natureza e Sociedade',
                'cargaHorariaDisciplina' => '40',
            ],
            [   'codigoDisciplina' => 'DIV04',
                'nomeDisciplina' => 'Informática',
                'cargaHorariaDisciplina' => '03',
            ],

        ];
        DB::table('disciplinas')->insert($d);
    }
}
