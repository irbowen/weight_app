<?php

declare(strict_types = 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../database.php';


/* Log in. Do nothing if already logged in
 * @method POST
 * @path /api/login/ 
 * */
$this->respond('GET', '/',
  function ($request, $response) {
    $db = new PG_DB();
    $query = "SELECT name, short_name FROM lifts";
    $result = $db->query($query)->fetchAll();
    $response->json($result);
  });
