<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'descricao' => $this->faker->text(100),
            'peso' => $this->faker->numberBetween(1, 9),
            'unidade_id' => $this->faker->numberBetween(1, 9),
        ];
    }
}
