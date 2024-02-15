<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DockWorker;
use App\Models\Administrative;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incident>
 */
class IncidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Titulo' => fake()->sentence(),
            'Imagen' => fake()->imageUrl(),
            'Leido' => fake()->boolean(),
             'Guardamuelle_id' => DockWorker::inRandomOrder()->value('Usuario_id'),
            'Descripcion' => fake()-> sentence(),
            'Administrativo_id' => Administrative::inRandomOrder()->value('Usuario_id'),
        ];
    }
}
