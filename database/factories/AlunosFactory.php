<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlunosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'whatssap' => $this->faker->name(),
            'instagran' => $this->faker->name(), // password
            'avatar' => $this->faker->imageUrl(200, 200, 'animals'),
        ];
    }
}
