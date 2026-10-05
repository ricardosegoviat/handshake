<?php

use App\Models\DiagnosticCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists consultants with their number of public cases', function () {
    // Arrange
    $john = User::factory()->create(['name' => 'John Doe']);
    User::factory()->create(['name' => 'Jane Roe']);

    DiagnosticCase::factory()->count(2)->create(['user_id' => $john->id, 'is_public' => true]);
    DiagnosticCase::factory()->create(['user_id' => $john->id, 'is_public' => false]);

    // Act
    $response = $this->get(route('consultants.index'));

    // Assert
    $response->assertOk();
    $response->assertSee('John Doe');
    $response->assertSee('2 cases');
    $response->assertDontSee('Jane Roe');
});

it('shows a consultant with their public cases only', function () {
    // Arrange
    $john = User::factory()->create(['name' => 'John Doe']);

    $publicCase = DiagnosticCase::factory()->create([
        'user_id' => $john->id,
        'is_public' => true,
        'title' => 'Public case',
    ]);
    $privateCase = DiagnosticCase::factory()->create([
        'user_id' => $john->id,
        'is_public' => false,
        'title' => 'Private case',
    ]);

    // Act
    $response = $this->get(route('consultants.show', $john));

    // Assert
    $response->assertOk();
    $response->assertSee('John Doe');
    $response->assertSee(route('cases.show', $publicCase), escape: false);
    $response->assertDontSee(route('cases.show', $privateCase), escape: false);
});

it('returns 404 for an unknown consultant', function () {
    $this->get(route('consultants.show', 999))->assertNotFound();
});
