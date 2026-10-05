<?php

use App\Models\DiagnosticCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
