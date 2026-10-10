<?php

use App\Models\Topic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists topics on the admin index page', function () {
    $user = User::factory()->create();
    Topic::factory()->create(['name' => 'Cybersecurity']);

    $response = $this->actingAs($user)->get(route('admin.topics.index'));

    $response->assertOk();
    $response->assertSee('Cybersecurity');
});

it('creates a topic', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('admin.topics.store'), [
        'name' => 'Cybersecurity',
    ]);

    $response->assertRedirect(route('admin.topics.index'));
    $this->assertDatabaseHas('topics', ['name' => 'Cybersecurity']);
});

it('validates the name when creating a topic', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('admin.topics.store'), [
        'name' => '',
    ]);

    $response->assertSessionHasErrors('name');
    $this->assertDatabaseCount('topics', 0);
});

it('updates a topic', function () {
    $user = User::factory()->create();
    $topic = Topic::factory()->create(['name' => 'Old Name']);

    $response = $this->actingAs($user)->put(route('admin.topics.update', $topic), [
        'name' => 'New Name',
    ]);

    $response->assertRedirect(route('admin.topics.index'));
    $this->assertDatabaseHas('topics', ['id' => $topic->id, 'name' => 'New Name']);
});

it('deletes a topic', function () {
    $user = User::factory()->create();
    $topic = Topic::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.topics.destroy', $topic));

    $response->assertRedirect(route('admin.topics.index'));
    $this->assertDatabaseMissing('topics', ['id' => $topic->id]);
});

it('requires authentication to manage topics', function () {
    $this->get(route('admin.topics.index'))->assertRedirect(route('login'));
});
