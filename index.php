<?php

spl_autoload_register(function($className) {
  $directory = "classes" . DIRECTORY_SEPARATOR;
  $fileExtension = ".php";
  $fullPath = $directory . $className . $fileExtension;

  require_once $fullPath; 
});

$sqlConn = new Connection("pizza_crud", "localhost", "root", "");
$pizzaDAO = new PizzaDAO($sqlConn);
$pizza = new Pizza("Calabresa", "Calabresa e cebola", "15,00");
$pizza2 = new Pizza("Muçarela", "Muçarela e tomate", "10,00");


$pizzaDAO->create($pizza);
$pizzaDAO->create($pizza2);

$pizza
  ->setPrice("17,00")
  ->setIngredients("Calabresa, muçarela e cebola");

$pizzaDAO->update($pizza);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Pizza - PHP</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
  <header class="conainter-fluid bg-primary shadow">
    <div class="container">
      <h1 class="text-center text-white text-uppercase py-4">Pizza CRUD</h1>
    </div>
  </header>

  <main class="mt-5">
    <section class="container shadow py-4 bg-light">
      <form action="" method="POST">

        <div class="row">
          <div class="col-sm-8 mb-4">
            <label for="flavor">Pizza:</label>
            <br>
            <input type="text" name="flavor" placeholder="Nome da pizza." class="w-100">
          </div>

          <div class="col-sm-4 mb-4">
            <label for="price">Preço:</label>
            <br>
            <input type="text" name="price" placeholder="R$0,00" class="w-100">
          </div>
        </div>
        
        <div class="mb-4">
          <label for="ingredients">Ingredientes:</label>
          <br>
          <textarea name="ingredients" rows="3" class="w-100" placeholder="Lista de ingredientes."></textarea>
        </div>

        <div class="d-flex justify-content-between">
          <input type="submit" value="Cadastrar" class="btn btn-primary">
          <button class="btn btn-danger">Limpar</button>
        </div>
      </form>

      
    </section>

    <section class="container shadow py-4 mt-5 bg-light">
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="w-25">Pizza</th>
            <th class="w-50">Ingredientes</th>
            <th>Preço</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Muçarela</td>
            <td>Muçarela e tomate.</td>
            <td>R$: 10,00</td>
            <td>
              <i class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg></i>
            </td>
          </tr>
          <tr>
            <td>Calabresa</td>
            <td>Calabresa e cebola.</td>
            <td>R$: 15,00</td>
            <td>          
              <i class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg></i>
          </td>
          </tr>
        </tbody>

      </table>
    <section>

    </section>
  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>