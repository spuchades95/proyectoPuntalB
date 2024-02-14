<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crew>
 */
class CrewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NumeroDeDocumento' => fake()->numerify('#########'),
            'Nombre' => fake()->name(),
            'Sexo' => fake()->randomElement(['Masculino', 'Femenino']),
            'Nacionalidad' => fake()->country(),
        ];
    }
}
