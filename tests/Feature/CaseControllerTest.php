<?php

use App\Models\DiagnosticCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

uses(RefreshDatabase::class);

it('lists public cases on the index page', function () {
    // Arrange
    DiagnosticCase::create([
        'title' => 'Public case',
        'description' => 'A case everyone can see',
        'maturity_level' => 'basic',
        'is_public' => true,
    ]);

    // Act
    $response = $this->get('/cases');

    // Assert
    $response->assertStatus(200);
    $response->assertSee('Public case');
});

it('does not list private cases on the index page', function () {
    // Arrange
    DiagnosticCase::create([
        'title' => 'Private case',
        'description' => 'A case only for the team',
        'maturity_level' => 'basic',
        'is_public' => false,
    ]);

    // Act
    $response = $this->get('/cases');

    // Assert
    $response->assertStatus(200);
    $response->assertDontSee('Private case');
});

    it('lists cases on the index page with the consultant name', function () {
        // Arrange
        $user = User::factory()->create([
            'name' => 'John Doe',
        ]);

        DiagnosticCase::factory()->create([
            'title' => 'Hello World',
            'is_public' => true,
            'user_id' => $user->id,
        ]);

        // Act
        $response = $this->get('/cases');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Hello World');
        $response->assertDontSee('by unknown');
        $response->assertSee('by John Doe');
    });

    it('shows unknown when a case has no consultant', function () {
        // Arrange
        DiagnosticCase::factory()->create([
            'title' => 'Hello World',
            'is_public' => true,
            'user_id' => null,
        ]);

        // Act
        $response = $this->get('/cases');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Hello World');
        $response->assertSee('by unknown');
    });
