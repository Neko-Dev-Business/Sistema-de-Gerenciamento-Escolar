<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;
use App\Models\Nota;

class NotaTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notas')->delete();

        $this->createNewUsers();
        Nota::factory()->count(25)->create();
    }

    protected function createNewUsers()
    {
        // $d = [

        //     [   'cidadeEndereco' => 'Paulo Afonso',
        //         'ufEndereco' => 'BA',
        //         'bairroEndereco' => 'Santa Inês',
        //         'logradouroEndereco' => 'Rua Santa Isabel',
        //         'numeroEndereco' => '61',
        //         'cepEndereco' => '48610296',
        //         'complementoEndereco' => 'Casa',
        //         'idPessoa' => '1',
        //     ],
        // ];
        // DB::table('enderecos')->insert($d);
    }
}


