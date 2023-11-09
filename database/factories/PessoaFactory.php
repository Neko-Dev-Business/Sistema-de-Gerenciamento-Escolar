<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PessoaFactory extends Factory
{
    protected $model = Pessoa::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'nomePessoa' => $faker->firstName(),
            'tipoPessoa' => 'F',
            'cpfPessoa' => $faker->numerify('###########'),
            'dataNascimentoPessoa' => $faker->date('Ymd', '2000-01-01'),
            'rgPessoa' => $faker->numerify('##########'),
            'generoPessoa' => 'M',
            'nacionalidadePessoa' => 'Brasileiro',
            'nomeMaePessoa' => $faker->name('female'),
            'nomePaiPessoa' => $faker->name('male'),
            'telefonePessoa' => $faker->phoneNumber,
            'emailPessoa' => $faker->unique()->safeEmail,
            'usuarioPessoa' => $faker->userName,
            'tipoUsuario' => $faker->randomElement(['1', '2', '3', '4']),
            'foto' => $faker->imageUrl(200, 200, 'people'),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
