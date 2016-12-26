<?php
declare(strict_types = 1);


function query_db() {

  $hostname = 'localhost';
  $dbname = 'weight';
  $username = 'weight';
  $password = 'weight';

  $str = "pgsql:host=$hostname;port=5432;dbname=$dbname;user=$username;password=$password";
  $db_handle = new PDO($str);
  $db_handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

