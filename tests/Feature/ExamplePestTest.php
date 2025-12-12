<?php

test('basic test', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('database connection works', function () {
    $this->assertDatabaseCount('migrations', 0);
});
