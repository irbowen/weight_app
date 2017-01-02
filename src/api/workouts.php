<?php

declare(strict_types = 1);
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../database.php';

// Match an integer as id on:
// /api/workouts/max/USERID
$this->respond('GET', '/max/[i:id]',
  function ($request, $response) {
    $db = new PG_DB();
    $query = "SELECT MAX(weight) AS max FROM workouts WHERE user_id = '$request->id'";
    $result = ['best_lift' => $db->query($query)->fetch()['max']];
    $response->json($result);
  });

// Match an integer as id on:
// /api/workouts/recent/USERID
$this->respond('GET', '/recent/[i:id]',
  function ($request, $response) {
    $db = new PG_DB();
    $query = "SELECT weight FROM workouts WHERE user_id = '$request->id' ORDER BY workout_date LIMIT 1";
    $result = ['recent_lift' => $db->query($query)->fetch()['weight']];
    $response->json($result);
  });

$this->respond('POST', '/add',
  function ($request, $response) {
    $db = new PG_DB();
    $insert_stmt = 'INSERT INTO workouts(workout_date, user_id, short_name, weight, reps, sets, notes) VALUES';
    $insert_stmt .= '(:date, :user_id, :short_name, :weight, :reps, :sets, :notes)';
    $prepared_stmt = $db->prepare($insert_stmt);
    $prepared_stmt->execute(['date' => $date, 'short_name' => $short_name,
      'reps' => $reps, 'sets' => $sets, 'user_id' => $user_id, 'weight' => $weight]);
    $response->json(['status' => 'good']);
  });

