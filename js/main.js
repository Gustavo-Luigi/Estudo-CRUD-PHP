const form = {
  body: document.getElementById("gz-form"),
  flavor: document.getElementById("flavor"),
  ingredients: document.getElementById("ingredients"),
  price: document.getElementById("price"),
  submitRequest: document.querySelectorAll(".submitRequest")
}

const pizzaTable = {
  tableBody: document.getElementById("gz-pizza-table-body")
}


form.submitRequest.forEach((submitButton) => {
  submitButton.addEventListener('click', (e) => {
    e.preventDefault();
    request = new XMLHttpRequest();

    const requestData = `flavor=${form.flavor.value}&ingredients=${form.ingredients.value}&price=${form.price.value}&pizzaRequest=${submitButton.value}`;
    
      request.open('post', 'request_handler.php');
      request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
      request.send(requestData);
      
      form.body.classList.remove("gz-edit-state");
  
      clearForm();
      clearTable();
      loadingTimer();
      setTimeout(() => {
        clearTable();
        getPizzas();
      }, 500);
      focusFlavor();
  });
});


addEventListener("DOMContentLoaded", () => {
  clearForm();
  focusFlavor();
  getPizzas();
});



function addEditListeners() {
  editIconArray = document.querySelectorAll(".gz-edit-icon");
  
  editIconArray.forEach((editIcon) => {
    editIcon.addEventListener('click', () => {
      focusPrice();
      form.body.classList.add("gz-edit-state");
      form.flavor.value = "teste";
    });
  });
}

async function getPizzas() {
  await fetch("request_handler.php")
    .then(response => {
      return response.json();
    })
    .then((data) => {
      console.log(data);
      displayPizzas(data);
      addEditListeners();
    })
    .catch(e => {
      console.log(e);
    });
}

function displayPizzas(pizzas) {

  pizzas.forEach((pizza) => {
    const newRow = document.createElement("tr");

    newRow.innerHTML = 
      `
        <td>${pizza.flavor}</td>
        <td>${pizza.ingredients}</td>
        <td>R$: ${pizza.price}</td>
        <td>
          <i class="text-primary gz-edit-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg></i>
        </td>
      `;

      pizzaTable.tableBody.appendChild(newRow);
  })
}

function clearTable() {
   pizzaTable.tableBody.querySelectorAll('*').forEach(child => child.remove());
}

function clearForm() {
  form.flavor.value = "";
  form.ingredients.value = "";
  form.price.value = "";
}

function loadingTimer() {
    pizzaTable.tableBody.innerHTML = 
    `
      <tr>
        <td colspan="4">
          <img class="gz-load" src="icons/pizza.svg" alt="Pizza girando">
        </td>
      </tr>
    `
}

function focusFlavor() {
  form.flavor.focus();
}

function focusPrice() {
  form.price.focus();
}