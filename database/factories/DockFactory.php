<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Facility;
use App\Models\Administrative;
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
            'Nombre' => fake()->name(),
            'Ubicacion' => fake()->word(),
            'Descripcion' => fake()->sentence(),
            'Capacidad' => fake()->numberBetween(0,10),
            'FechaCreacion' => fake()->dateTimeBetween('-2 year','+2 year'),
            'Instalacion_id' => Facility::inRandomOrder()->value('id'),
            
           

        ];
    }
}
