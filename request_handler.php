<?php

spl_autoload_register(function($className) {
  $directory = "classes" . DIRECTORY_SEPARATOR;
  $fileExtension = ".php";
  $fullPath = $directory . $className . $fileExtension;

  require_once $fullPath; 
});

$sqlConn = new Connection("pizza_crud", "localhost", "root", "");
$pizzaDAO = new PizzaDAO($sqlConn);

$flavor = $_POST["flavor"];
$ingredients = $_POST["ingredients"];
$price = $_POST["price"];
$requestType = $_POST["pizzaRequest"];

var_dump($requestType);

$pizza = new Pizza($flavor, $ingredients, $price);
$entrou = "nao entrou";

switch($requestType) {
  case "Cadastrar":
    $entrou = "entrou";
    $pizzaDAO->create($pizza);
    echo "entrou";
    break;
}