<?php

namespace Database\Factories;
use App\Models\Boat;
use App\Models\Transit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransitBoat>
 */
class TransitBoatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'FechaEntrada' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'FechaSalida' => $this->faker->dateTimeBetween('now', '+1 month'),
            'Transito_id' => Transit::inRandomOrder()->first()->id,
            'Embarcacion_id' => Boat::inRandomOrder()->first()->id,
        ];
    }
}
