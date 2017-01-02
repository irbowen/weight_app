<?php

declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/database.php';

define('LANDING_PAGE','../static/js/index.html');
define('API_ROUTES', ['workouts', 'lifts', 'login']);

$klein = new \Klein\Klein();

$klein->respond(function ($request, $response, $service, $app) use ($klein) {
  // $app also can store lazy services, e.g. if you don't want to
  // instantiate a database connection on every response
  $app->register('db', function() {
    $hostname = 'localhost';
    $dbname = 'weight';
    $username = 'weight';
    $password = 'weight';

    $str = "pgsql:host=$hostname;port=5432;dbname=$dbname;user=$username;password=$password";
    return new PDO($str);
  });

});

$klein->respond('GET', '/home',
  function ($request, $response, $service, $app) {
    $sql_query = "select name, short_name, description from lifts";
    $result = $app->db->query($sql_query);

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
