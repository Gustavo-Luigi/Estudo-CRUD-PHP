const form = {
  flavor: document.getElementById("flavor"),
  ingredients: document.getElementById("ingredients"),
  price: document.getElementById("price"),
  submitRequest: document.querySelectorAll(".submitRequest")
}


form.submitRequest.forEach((submitButton) => {
  submitButton.addEventListener('click', (e) => {
    e.preventDefault();
    request = new XMLHttpRequest();
  
    const requestData = `flavor=${form.flavor.value}&ingredients=${form.ingredients.value}&price=${form.price.value}&pizzaRequest=${submitButton.value}`;
    
    request.open('post', 'request_handler.php');
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
    request.send(requestData);
  });
});

