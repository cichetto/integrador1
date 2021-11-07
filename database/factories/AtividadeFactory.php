<?php

namespace Database\Factories;

use App\Models\Atividade;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtividadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Atividade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => $this->faker->unique()->numberBetween(2,29),
            'treinamento_id' => $this->faker->numberBetween(2, 10),
            'data_inicio' => $this->faker->dateTime($max = 'now', $timezone = null),
            'data_fim' => $this->faker->dateTime($max = 'now', $timezone = null),
            // 'status' => $this->faker->randomElements($array = array ('a','b','c'), $count = 1),
        ];
    }
}
