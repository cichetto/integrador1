<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'login' => $this->faker->unique()->userName(),
            'senha' => '123',
            'cadastro' => $this->faker->unique()->numberBetween(11111, 99999),
            'nome' => $this->faker->name(),
            'grupo_id' => $this->faker->numberBetween(1,10),
            'area_id' => $this->faker->numberBetween(1,10),
            // 'tipo' => $this->faker->randomElements(['a','b','c'], 1),
        ];
    }
}
