<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Administrative>
 */
class AdministrativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::where('Rol_id', 2)->inRandomOrder()->value('id');
        // $adminUsers = User::where('Rol_id', 2)->get();


        return [
            // Define tus atributos aquí
            'Usuario_id' => $userId,
            // Otros atributos si los tienes
        ];
    }
}
