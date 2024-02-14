<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dock>
 */
class DockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre' => $this->faker->word,
            'Ubicacion' => $this->faker->word,
            'Descripcion' => $this->faker->text,
            'Capacidad' => $this->faker->randomNumber(2),
            'FechaCreacion' => $this->faker->date(),
            'Instalacion_id' => $this->faker->randomNumber(1),

        ];
    }
}
