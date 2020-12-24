<?php

spl_autoload_register(function($className) {
  $directory = "classes" . DIRECTORY_SEPARATOR;
  $fileExtension = ".php";
  $fullPath = $directory . $className . $fileExtension;

  require_once $fullPath; 
});

$sqlConn = new Connection("pizza_crud", "localhost", "root", "");
$pizzaDAO = new PizzaDAO($sqlConn);

if(isset($_POST["flavor"])) {
  $flavor = $_POST["flavor"];
  $ingredients = $_POST["ingredients"];
  $price = $_POST["price"];
  $requestType = $_POST["pizzaRequest"];
  
  
  $pizza = new Pizza($flavor, $ingredients, $price);
  
  switch($requestType) {
    case "Cadastrar":
      $pizzaDAO->create($pizza);
      break;
    case "Salvar":
      $pizzaDAO->update($pizza);
      break;
    case "Excluir":
      $pizzaDAO->delete($pizza);
      break;
  }
  
  echo json_encode(
    $pizzaDAO->read()
  );
  
} else {
  echo json_encode(
    $pizzaDAO->read()
  );
}
