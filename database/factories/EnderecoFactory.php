<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\Uf;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class EnderecoFactory extends Factory
{
    protected $model = Endereco::class;
    private $uniqueNumbers = [];
    private $ufOptions = [];

    public function definition()
    {
        $faker = \Faker\Factory::create();

        if (empty($this->uniqueNumbers)) {
            $this->uniqueNumbers = range(2, 26); // Cria um array de números de 2 a 26
            shuffle($this->uniqueNumbers); // Embaralha aleatoriamente os números
        }

        if (empty($this->ufOptions)) {
            $this->ufOptions = Uf::pluck('ufSigla')->toArray(); // Recupera as siglas das UFs da tabela UF
        }

        return [
            'idPessoa' => array_pop($this->uniqueNumbers),
            'cepEndereco' => $faker->numerify('#####-###'),
            'logradouroEndereco' => $faker->streetAddress,
            'complementoEndereco' => $faker->secondaryAddress,
            'bairroEndereco' => $faker->citySuffix,
            'cidadeEndereco' => $faker->city,
            'numeroEndereco' => $faker->buildingNumber,
            'ufEndereco' => 'BA'
        ];
    }
}

