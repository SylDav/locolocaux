<?php

use Illuminate\Support\Facades\DB;

test('basic test', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('database connection works', function () {
    // Vérifie que la connexion à la base de données fonctionne
    // en testant que la table des migrations n'est pas vide
    $this->assertTrue(\DB::table('migrations')->count() > 0, 'La table des migrations devrait contenir des entrées');
});
