<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class configFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mensagem' => $this->faker->sentence(),
        ];
    }
}
