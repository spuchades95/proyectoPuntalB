<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Berth;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BaseBerth>
 */
class BaseBerthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Amarre_Id' =>Berth::inRandomOrder()->value('id'),
            'DatosEstancia' => fake()->sentence(),
            'FechaEntrada' => fake()->dateTimeBetween('-1 year', '+1 year'),
            'FinContrato' => fake()->dateTimeBetween('FechaEntrada', '+1 year'),
        ];
    }
}
