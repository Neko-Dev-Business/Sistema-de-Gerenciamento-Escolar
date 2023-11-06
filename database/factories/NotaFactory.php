<?php

namespace Database\Factories;

use App\Models\Nota;
use App\Models\Uf;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class NotaFactory extends Factory
{
    protected $model = Nota::class;
    private $uniqueNumbers = [];

    public function definition()
    {
        if (empty($this->uniqueNumbers)) {
            $this->uniqueNumbers = range(2, 26); // Cria um array de números de 2 a 26
            shuffle($this->uniqueNumbers); // Embaralha aleatoriamente os números
        }

        return [
            'primeiraNota' => $this->faker->randomFloat(1, 0.1, 10.0),
            'segundaNota' => $this->faker->randomFloat(1, 0.1, 10.0),
            'terceiraNota' => $this->faker->randomFloat(1, 0.1, 10.0),
            'quartaNota' => $this->faker->randomFloat(1, 0.1, 10.0),
            'primeiraRecuperacao' => null,
            'segundaRecuperacao' => null,
            'terceiraRecuperacao' => null,
            'quartaRecuperacao' => null,
            'unidade' => rand(1,4), // Altere conforme necessário
            'idPessoa' => array_pop($this->uniqueNumbers),
            'idTurma' => rand(1,20),
            'idDisciplina' => rand(1,20),
        ];
    }
}

