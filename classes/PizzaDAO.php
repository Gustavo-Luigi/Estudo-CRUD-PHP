<?php

class PizzaDAO {

  private $conn;

  public function __construct(Connection $pizzaConn) {
    $this->conn = $pizzaConn->getConnection();
  }

  public function create(Pizza $pizza) {
    $sqlQuery = "INSERT INTO pizza_menu (flavor, ingredients, price) VALUES (:flavor, :ingredients, :price);";

    $pstm = $this->conn->prepare($sqlQuery);

    $flavor = $pizza->getFlavor();
    $ingredients = $pizza->getIngredients();
    $price = $pizza->getPrice();
    
    $pstm->bindParam(":flavor", $flavor);
    $pstm->bindParam(":ingredients", $ingredients);
    $pstm->bindParam(":price", $price);

    $pstm->execute();
  }

  public function read() {

  }

  public function update(Pizza $pizza) {

  }

  public function delete(Pizza $pizza) {
    
  }
}