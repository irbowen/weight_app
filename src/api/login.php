<?php

declare(strict_types = 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../database.php';

session_start();

$check_login = function ($request, $response, $service, $app) {
  if (session_status() == PHP_SESSION_ACTIVE && array_key_exists('user_id', $_SESSION)) {
    $response->json(['logged_in' => 'true', 'user_id' => $_SESSION['user_id']]);
  }
  else {
    $response->json(['logged_in' => 'false']);
  }
};

$login = function ($request, $response, $service, $app) {
  if (session_status() == PHP_SESSION_ACTIVE && array_key_exists('user_id', $_SESSION)) {
    $response->json(['logged_in' => 'true', 'user_id' => $_SESSION['user_id']]);
  }
  else {
    // Get the token, update the login time in the database
    $user_id = $request->param('user_id');
    $name = $request->param('name');

    // Update the last login timestamp
    $update_stmt = 'UPDATE users SET last_login = NOW() WHERE user_id = :user_id';
    $prepared_stmt = $app->db->prepare($update_stmt);
    $prepared_stmt->execute(['user_id' => $user_id]);

    // Start up the sesio and respond with logged in
    $_SESSION['user_id'] = $user_id;
    $response->json(['logged_in' => 'true', 'user_id' => $_SESSION['user_id']]);
  }
};

/* Check to see if we are logged in
 * @method GET
 * @path /api/login/
 * */
$this->respond('GET', '/', $check_login);

/* Log in. Do nothing if already logged in
 * @method POST
 * @path /api/login/
 * */
$this->respond('POST', '/', $login);

