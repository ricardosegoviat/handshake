<?php

namespace Database\Factories;

use App\Models\DiagnosticCase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DiagnosticCase>
 */
class DiagnosticCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'maturity_level' => $this->faker->randomElement(['basic', 'developing', 'advanced']),
            'needs' => $this->faker->paragraph(),
            'recommendations' => $this->faker->paragraph(),
            'is_public' => $this->faker->boolean(),
            'organization_id' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
