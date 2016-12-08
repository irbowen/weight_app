<?php
declare(strict_types = 1);

function query_db() {

  $host = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "weight";

  $db_handle = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $db_handle->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  try {
    $query_handle = $db_handle->query('SELECT name, description FROM lifts');
    $query_handle->setFetchMode(PDO::FETCH_ASSOC);
    while($row = $query_handle->fetch()) {
      echo $row['name'] . "<br/>";
      echo $row['description'] . "<br/>";
    }
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }

}

