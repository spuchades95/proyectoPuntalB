<?php

namespace Database\Factories;
use App\Models\Rental;
use App\Models\Boat;
use App\Models\BaseBerth;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'FechaInicio' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'FechaFinalizacion' => $this->faker->dateTimeBetween('now', '+1 year'),
            'PlazaBase_id' => BaseBerth::inRandomOrder()->first()->id,
            'Embarcacion_id' => Boat::inRandomOrder()->first()->id,
        ];
    }

 
}
