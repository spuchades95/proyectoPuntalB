<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facility>
 */
class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Ubicacion' => fake()->name(),
            'Dimensiones' => fake()->numberBetween(1, 100),
            'Descripcion' => fake()->sentence(),
            'Estado' => fake()->sentence(),
            'FechaCreacion' => fake()->date(),
         

        ];
    }
}
