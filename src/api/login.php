<?php

declare(strict_types = 1);
require_once __DIR__ . '/../../vendor/autoload.php';

/* Check to see if we are logged in 
 * @method GET
 * @path /api/login/
 * */
$this->respond('GET', '/',
  function ($request, $response) {
    if (session_status() == PHP_SESSION_ACTIVE) {
      $response->json(['status' => 'logged_in']);
    }
    else {
      $response->json(['status' => 'logged_out']);
    }
  });
