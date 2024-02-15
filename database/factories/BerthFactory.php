<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dock;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berth>
 */
class BerthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Estado' => fake()->randomElement(['Operativo', 'No operativo']),
            'TipoPlaza' => fake()->randomElement(['Transito', 'Plaza Base']),
            'Anio' => fake()->dateTimeBetween('-1 year', '+1 year'),
            'Causa'=>fake()->sentence(),
            'Pantalan_id' => Dock::inRandomOrder()->value('id'),
        ];
    }
}
