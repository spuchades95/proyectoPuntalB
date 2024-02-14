<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boat>
 */
class BoatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Matricula' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{4}'),
            'Manga' => $this->faker->randomFloat(2, 1, 10),
            'Eslora' => $this->faker->randomFloat(2, 1, 10),
            'Origen' => $this->faker->randomElement(['Nacional', 'Extranjero']),
            'Titular' => $this->faker->name,
            'Imagen' => $this->faker->imageUrl(),
            'Numero_registro' => $this->faker->unique()->randomNumber(8),
            'Datos_tecnicos' => $this->faker->text,
            'Modelo' => $this->faker->word,
            'Nombre' => $this->faker->word,
            'Tipo' => $this->faker->randomElement(['Vela', 'Motor', 'Pesca', 'Deportivo', 'Yate', 'Lancha', 'Velero']),

        ];
    }
}
