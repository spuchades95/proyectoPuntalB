<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boat>
 */
class BoatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Matricula' => fake()->lexify('??') . '-' . fake()->numerify('######'),
            'Manga' => fake()->numberBetween(3,10),
            'Eslora' => fake()->numberBetween(10,40),
            'Origen' => fake()->country(),
            'Titular' => fake()->name(),
            'Imagen' =>fake()->imageUrl(),
            'Datos_Tecnicos' => fake()->sentence(),
            'Modelo' => fake()->word(),
            'Nombre' => fake()->name(),
            'Tipo' => fake()->randomElement(['Velero', 'Yate','Catamarán','Lancha']),

        ];
    }
}
