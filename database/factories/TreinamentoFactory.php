<?php

namespace Database\Factories;

use App\Models\Treinamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreinamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Treinamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->word(),
            'descricao' => $this->faker->text($maxNbChars = 200),
            'area_id' => $this->faker->numberBetween(1, 15),
            'validade' => $this->faker->dateTime($max = 'now', $timezone = null),
            'celulas' => $this->faker->word(),
            'anexo' => 'C:\Users\laura\Documents\treinamentos\titulo.pdf',
        ];
    }
}
