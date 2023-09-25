<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'visitante', 'name' => 'Visitante', 'level' => 5],
            ['title' => 'familiar', 'name' => 'Familiar', 'level' => 4],
            ['title' => 'professor', 'name' => 'Professor', 'level' => 3],
            ['title' => 'admin', 'name' => 'Admin', 'level' => 2],
            ['title' => 'super_admin', 'name' => 'Super Admin', 'level' => 1],
        ];
        DB::table('user_types')->insert($data);
    }
}
