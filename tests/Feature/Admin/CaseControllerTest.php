<?php

use App\Models\DiagnosticCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lets the owner open the edit page of their case', function () {
    // Arrange
    $owner = User::factory()->create();
    $case = DiagnosticCase::factory()->create(['user_id' => $owner->id]);

    // Act
    $response = $this->actingAs($owner)->get(route('admin.cases.edit', $case));

    // Assert
    $response->assertOk();
});

it('lets an admin open the edit page of any case', function () {
    // Arrange
    $admin = User::factory()->create(['is_admin' => true]);
    $case = DiagnosticCase::factory()->create();

    // Act
    $response = $this->actingAs($admin)->get(route('admin.cases.edit', $case));

    // Assert
    $response->assertOk();
});

it('does not let another user open the edit page', function () {
    // Arrange
    $stranger = User::factory()->create();
    $case = DiagnosticCase::factory()->create();

    // Act
    $response = $this->actingAs($stranger)->get(route('admin.cases.edit', $case));

    // Assert
    $response->assertUnauthorized();
});

it('does not let another user delete a case', function () {
    // Arrange
    $stranger = User::factory()->create();
    $case = DiagnosticCase::factory()->create();

    // Act
    $response = $this->actingAs($stranger)->delete(route('admin.cases.destroy', $case));

    // Assert
    $response->assertUnauthorized();
    $this->assertDatabaseHas('cases', ['id' => $case->id]);
});
