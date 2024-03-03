<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DockWorker>
 */
class DockWorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::where('Rol_id', 3)->inRandomOrder()->value('id');
        return [
            'Usuario_id' => $userId,

        ];
    }
    public function withRoleThree(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'Usuario_id' => User::where('Rol_id', 3)->inRandomOrder()->value('id'),
            ];
        });
    }
}
