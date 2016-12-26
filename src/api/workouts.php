<?php

declare(strict_types = 1);
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../database.php';

// Match an integer as id on:
// /api/workouts/recent/USERID
$this->respond('GET', '/recent/[i:id]',
  function ($request, $response) {
    $db = new PG_DB();
    $query = "SELECT MAX(weight) AS max FROM workouts WHERE user_id = '$request->id'";
    $result = ['best_lift' => $db->query($query)->fetch()['max']];
    $response->json($result);
  });

