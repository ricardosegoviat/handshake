<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'country' => $this->faker->country(),
            'bio' => $this->faker->paragraph(),
            'website' => $this->faker->url(),
            'org_type' => $this->faker->randomElement(['company', 'ngo', 'school', 'public institution']),
            'org_size' => $this->faker->randomElement(['startup', 'small', 'medium', 'large']),
        ];
    }
}
