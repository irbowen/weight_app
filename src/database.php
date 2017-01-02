<?php

declare(strict_types = 1);

class PG_DB {

  function __construct() {
    $hostname = 'localhost';
    $dbname = 'weight';
    $username = 'weight';
    $password = 'weight';

    $str = "pgsql:host=$hostname;port=5432;dbname=$dbname;user=$username;password=$password";
    $this->db_handle = new PDO($str);
  }

  /* Handy function for doing queries. Probably a better
   * idea to use the raw pdo interface */
  function query($query_str) {
    $this->db_handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
      $query_handle = $this->db_handle->query($query_str);
      $query_handle->setFetchMode(PDO::FETCH_ASSOC);
      return $query_handle;
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

}

