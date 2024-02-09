<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Facility;
use App\Models\Role;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NombreCompleto' => fake()->name(),
            'Habilitado' => fake()->boolean(),
            'NombreUsuario' => fake()->userName(),
            'Instalacion_id' => Facility::inRandomOrder()->value('id'),
            'DNI' => fake()->bothify('########?'),
            'Telefono' => fake()->phoneNumber(),
            'Direccion' => fake()->address(),
            'Imagen' => fake()->imageUrl(),
            'Descripcion' => fake()->sentence(),
            'Rol_id' => Role::inRandomOrder()->value('id'),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
