<?php

use App\Models\DiagnosticCase;
use App\Models\Topic;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists topics with their number of public cases', function () {
    // Arrange
    $security = Topic::factory()->create(['name' => 'Security']);
    Topic::factory()->create(['name' => 'Governance']);

    $publicCases = DiagnosticCase::factory()->count(2)->create(['is_public' => true]);
    $privateCase = DiagnosticCase::factory()->create(['is_public' => false]);

    $security->cases()->attach($publicCases->pluck('id'));
    $security->cases()->attach($privateCase->id);

    // Act
    $response = $this->get(route('topics.index'));

    // Assert
    $response->assertOk();
    $response->assertSee('Security');
    $response->assertSee('Governance');
    $response->assertSee('2 cases');
});

it('shows a topic with its public cases only', function () {
    // Arrange
    $topic = Topic::factory()->create(['name' => 'Security']);

    $publicCase = DiagnosticCase::factory()->create(['is_public' => true, 'title' => 'Public case']);
    $privateCase = DiagnosticCase::factory()->create(['is_public' => false, 'title' => 'Private case']);

    $topic->cases()->attach([$publicCase->id, $privateCase->id]);

    // Act
    $response = $this->get(route('topics.show', $topic));

    // Assert
    $response->assertOk();
    $response->assertSee('Security');
    $response->assertSee(route('cases.show', $publicCase), escape: false);
    $response->assertDontSee(route('cases.show', $privateCase), escape: false);
});

it('returns 404 for an unknown topic', function () {
    $this->get(route('topics.show', 999))->assertNotFound();
});
