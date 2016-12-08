<?php
declare(strict_types = 1);
require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/database.php';

$klein = new \Klein\Klein();

$klein->respond('GET', '/', function () {

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "weight";

  $conn = new mysqli($servername, $username, $password, $dbname);

  $sql_query = "select * from lifts";
  $result = $conn->query($sql_query);

  echo "<table>";
  if ($result->num_rows > 0) {
    echo "<tr><th>Name</th><th>Description</th></tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["name"]."</td><td>".$row["description"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $conn->close();

});



$klein->respond('GET', '/hello-world', function () {
  query_db();
});

$klein->dispatch();
