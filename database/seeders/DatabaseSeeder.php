<?php

namespace Database\Seeders;

use App\Models\DiagnosticCase;
use App\Models\Organization;
use App\Models\Provider;
use App\Models\ProviderMatch;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Consultant User',
            'email' => 'consultant@example.com',
        ]);

        User::factory(3)->create();

        Organization::factory(5)->create();

        Provider::factory(5)->create();

        DiagnosticCase::factory(10)->create();

        ProviderMatch::factory(20)->create();
    }
}
