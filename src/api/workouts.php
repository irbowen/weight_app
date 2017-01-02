<?php

declare(strict_types = 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../database.php';


// Match an integer as id on:
// /api/workouts/max/USERID
$this->respond('GET', '/max/',
  function ($request, $response, $service, $app) {
    $user_id = $_SESSION['user_id'];
    $query = 'SELECT MAX(weight) AS max FROM workouts WHERE user_id = :user_id';
    $prepared_stmt = $app->db->prepare($query);
    $prepared_stmt->execute(['user_id' => $user_id]);
    $results = $prepared_stmt->fetch();
    $response->json(['user_id' => $user_id, 'best_lift' => $results['max']]);
  });

// Match an integer as id on:
// /api/workouts/recent/USERID
$this->respond('GET', '/recent/',
  function ($request, $response, $service, $app) {
    $user_id = $_SESSION['user_id'];
    $query = 'SELECT weight FROM workouts WHERE user_id = :user_id ORDER BY workout_date LIMIT 1';
    $prepared_stmt = $app->db->prepare($query);
    $prepared_stmt->execute(['user_id' => $user_id]);
    $response->json(['recent_lift' => $prepared_stmt->fetch()['weight']]);
  });

$this->respond('POST', '/add/',
  function ($request, $response, $service, $app) {

    $post_params = json_decode(trim(file_get_contents('php://input')), true);
    extract($post_params);
    $insert_stmt = 'INSERT INTO workouts(workout_date, user_id, short_name, weight, reps, sets, notes) VALUES';
    $insert_stmt .= '(:date, :user_id, :short_name, :weight, :reps, :sets, :notes)';

    $prepared_stmt = $app->db->prepare($insert_stmt);
    $prepared_stmt->execute(['date' => $date, 'short_name' => $short_name,'reps' => $reps,
      'sets' => $sets, 'user_id' => $user_id, 'weight' => $weight, 'notes' => $notes]);
    $response->json(['status' => 'good']);
  });

