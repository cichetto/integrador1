<?php

namespace Database\Factories;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agenda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => $this->faker->unique()->numberBetween(1, 50),
            'grupo_id' => $this->faker->numberBetween(1, 10),
            'area_id' => $this->faker->numberBetween(1, 10),
            'treinamento_id' => $this->faker->numberBetween(2, 10),
            'prazo' => $this->faker->dateTime(),
        ];
    }
}
