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

            ['nomeDisciplina' => 'Português'],
            ['nomeDisciplina' => 'Matemática'],
            ['nomeDisciplina' => 'Geografia'],
            ['nomeDisciplina' => 'História'],
            ['nomeDisciplina' => 'Ciências'],
            ['nomeDisciplina' => 'Artes'],
            ['nomeDisciplina' => 'Religião'],
            ['nomeDisciplina' => 'Química'],
            ['nomeDisciplina' => 'Física'],
            ['nomeDisciplina' => 'Redação'],
            ['nomeDisciplina' => 'Educação Física'],
            ['nomeDisciplina' => 'Inglês'],
            ['nomeDisciplina' => 'Espanhol'],
            ['nomeDisciplina' => 'Teatro'],
            ['nomeDisciplina' => 'Música'],
            ['nomeDisciplina' => 'Filosofia'],
            ['nomeDisciplina' => 'Sociologia'],
            ['nomeDisciplina' => 'Educação Financeira'],
            ['nomeDisciplina' => 'Natureza e Sociedade'],
            ['nomeDisciplina' => 'Informática'],

        ];
        DB::table('disciplinas')->insert($d);
    }
}
