<?php

declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/database.php';

define('LANDING_PAGE','../static/js/index.html');
define('API_ROUTES', ['workouts', 'lifts']);

$klein = new \Klein\Klein();

$klein->respond('GET', '/home',
  function () {
    $db = new PG_DB();
    $sql_query = "select name, short_name, description from lifts";
    $result = $db->query($sql_query);

    echo "<table>";
    if (true or $result->num_rows > 0) {
      echo "<tr><th>Name</th><th>Description</th></tr>";
      while ($row = $result->fetch()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["description"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
  });

$klein->respond('GET', '/phpinfo',
  function () {
    phpinfo();
  });

$klein->respond('GET', '/',
  function () {
    include(LANDING_PAGE);
  });

// Include all routes defined in a file under a given namespace
foreach (API_ROUTES as $controller) {
  $klein->with("/api/$controller", "../src/api/$controller.php");
}

$klein->dispatch();
