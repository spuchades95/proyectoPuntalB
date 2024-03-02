<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Concessionaire>
 */
class ConcessionaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
       
    {
        $usuarioId = User::where('Rol_id', 1)->inRandomOrder()->value('id');
        return [
            'Usuario_id' => $usuarioId,
        ];
    }

    public function withRoleOne(): self
    {
        return $this->state([
            'Rol_id' => 1,
        ]);
    }
}
