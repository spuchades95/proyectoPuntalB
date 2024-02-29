<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DockWorker;
use App\Models\Berth;
use App\Models\Administrative;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transit>
 */
class TransitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            // 'Proposito' => fake()->randomElement(['turismo', 'pesca deportiva', 'navegacion recreativa','evento']),
            // 'FechaEntrada' => fake()->dateTimeBetween('-1 year', '+1 year'),
            'Guardamuelles_id' => DockWorker::inRandomOrder()->value('Usuario_id'),
            // 'FechaSalida' => fake()->dateTimeBetween('-1 year', '+1 year'),
            // 'Autorizacion' => fake()->numberBetween(-128, 127),
            // 'Proposito' => fake()->randomElement(['turismo', 'pesca deportiva', 'navegacion recreativa','evento']),
            'Amarre_id' => Berth::inRandomOrder()->value('id'),
            'Leido' => $this->faker->boolean(),
            // 'FechaEntrada' => $this->faker->dateTimeBetween('-1 year', 'now'),
            // 'Guardamuelles_id' => DockWorker::inRandomOrder()->value('Usuario_id'),
            // 'FechaSalida' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'Administrativo_id' => Administrative::inRandomOrder()->value('Usuario_id'),
            
           
           
            
          
            // 'Autorizacion' => fake()->numberBetween(-128, 127),
           
           

        ];
    }
}
