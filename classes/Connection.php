<?php

class Connection {

  private $connection;
  
  public function __construct($database, $hostName, $username, $password) {

    $this->connection = new PDO("mysql:dbname=$database;host=$hostName", $username, $password);
  }

  public function getConnection() {
    if($this->connection instanceof PDO) {
      return $this->connection;
    }
  }
}