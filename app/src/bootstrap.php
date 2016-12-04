<?php declare(strict_types = 1);
require_once __DIR__ . '/../vendor/autoload.php';

$servername = "localhost";

$klein = new \Klein\Klein();

$klein->respond('GET', '/', function () {

  $dummy = "test";
  echo $dummy;

  /*
  $conn = new mysqli($servername, $username, $password, $dbname);

  $sql_query = "select * from lifts";
  $result = $conn->query($sql_query);

  if ($result->num_rows > 0) {
      echo "<table><tr><th>ID</th><th>Name</th></tr>";
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }
  $conn->close();
  */

});



$klein->respond('GET', '/hello-world', function () {
  print_r($_REQUEST);
  return 'Hello World!';
});

$klein->dispatch();
