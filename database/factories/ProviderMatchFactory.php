<?php

namespace Database\Factories;

use App\Models\ProviderMatch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProviderMatch>
 */
class ProviderMatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence(),
            'case_id' => $this->faker->numberBetween(1, 10),
            'provider_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
