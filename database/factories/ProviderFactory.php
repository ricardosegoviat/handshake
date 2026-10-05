<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Provider>
 */
class ProviderFactory extends Factory
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
            'country' => $this->faker->randomElement(['Germany', 'France', 'Spain', 'Netherlands', 'Sweden', 'Portugal']),
            'bio' => $this->faker->paragraph(),
            'website' => $this->faker->url(),
            'specialty' => $this->faker->randomElement(['Cybersecurity', 'Data analytics', 'Cloud migration', 'Software development', 'AI consulting']),
        ];
    }
}
