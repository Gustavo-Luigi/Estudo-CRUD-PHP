<?php

class PizzaDAO {

  private Connection $conn;

  public function __construct(Connection $pizzaConn) {
    $this->conn = $pizzaConn->getConnection();
  }

  public function create(Pizza $pizza) {

  }

  public function read() {

  }

  public function update(Pizza $pizza) {

  }

  public function delete(Pizza $pizza) {
    
  }
}