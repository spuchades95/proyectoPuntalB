<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DockWorker;
use App\Models\Administrative;
use App\Models\User;


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
        // return [
        //     'Titulo' => fake()->sentence(),
        //     'Imagen' => fake()->imageUrl(),
        //     'Leido' => fake()->boolean(),
        //      'Guardamuelle_id' => DockWorker::inRandomOrder()->value('Usuario_id'),
        //     'Descripcion' => fake()-> sentence(),
        //     'Administrativo_id' => Administrative::inRandomOrder()->value('Usuario_id'),
        // ];
        $guardamuellesIds = User::where('Rol_id', 3)
        ->inRandomOrder()
            ->pluck('id')
            ->toArray();

        $administrativosIds = User::where('Rol_id', 2)
            ->inRandomOrder()
            ->pluck('id')
            ->toArray();

        return [
            'Titulo' => $this->faker->sentence(),
            // 'Imagen' => $this->faker->imageUrl(),
            'Imagen' => '/storage/image/yate.jpg',
            'Leido' => false,
            'Guardamuelle_id' => DockWorker::inRandomOrder()->first()->Usuario_id,
            // 'Guardamuelle_id' => $this->faker->randomElement($guardamuellesIds),
            'Descripcion' => $this->faker->sentence(),
            'Administrativo_id' => Administrative::inRandomOrder()->first()->Usuario_id,
        ];
    }
}