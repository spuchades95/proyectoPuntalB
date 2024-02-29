<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'NombreRol' => "4",
                'Permisos' => $this->faker->randomElement(['lectura', 'modificacion', 'eliminacion']),
                'Descripcion' => fake()->sentence(),
                      
        ];
    }
}
