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
            'DatosEstancia' => $this->faker->text(),
            'FechaEntrada' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'FinContrato' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'Amarre_Id' =>Berth::inRandomOrder()->value('id'),
           
        ];
    }
}
