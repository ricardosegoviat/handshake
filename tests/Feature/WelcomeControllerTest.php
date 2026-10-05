<?php

test('Test welcome page content', function () {
    // Arrange

    // Act
    $response = $this->get('/');

    // Assert
    $response->assertStatus(200);
    $response->assertSee('Welcome to Handshake');
    $response->assertSee('Home');
});
