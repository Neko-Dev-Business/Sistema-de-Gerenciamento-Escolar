<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EscolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('escolas')->insert([
            'nomeEscola' => 'ESCOLA MUNICIPAL DE CARAVELA DO SUL',
            'secretariaEscola' => 'JUCILEIDE MARIA DA SILVA',
            'diretoraEscola' => 'CARLOS JOSE DE ANDRADE',
            'enderecoEscola' => 'RUA DAS CARAVELAS N° 15, CENTRO, CARAVELA DO SUL, BAHIA',
            'assinaturaDiretoraEscola' => 'carlos jose',
            'telefoneEscola' => '(75)98835-8406',
            'emailEscola' => 'CARAVELA@ESCOLA.COM',
            'cnpjEscola' => '90.782.217/0001-93',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
