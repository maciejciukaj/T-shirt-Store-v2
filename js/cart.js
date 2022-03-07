//sessionStorage.clear();
function showCart() {
  var totalCost = 0;
  var listOfProducts = JSON.parse(localStorage.getItem("listOfProducts"));
  var text = "";
  if (listOfProducts == null) {
    text += `<div class="cart-empty">Your cart is empty 🙁</div>`;
  } else {
    if (listOfProducts.length >= 10)
      document.getElementById(
        "cart"
      ).innerHTML = `Cart 🛒<span style="color:red"</span>(9+)`;
    else
      document.getElementById(
        "cart"
      ).innerHTML = ` Cart 🛒(${listOfProducts.length})`;

    for (var i = 0; i < listOfProducts.length; i++) {
      // if (sessionStorage.key(i) != "IsThisFirstTime_Log_From_LiveServer") {
      totalCost += listOfProducts[i].quantity * 9.9;
      if (listOfProducts[i].size == "X") listOfProducts[i].size += "L";
      text += `<div class="mini my-2 mx-2"> <img src="assets/${listOfProducts[i].color}_mini.png" alt="miniatura" ></img></div><div class="mx-3 py-3 tshirt-desc "><i>T-shirt</i> &nbsp;&nbsp;   Color: <b>${listOfProducts[i].color}</b> &nbsp;&nbsp; Size: <b>${listOfProducts[i].size}</b> &nbsp;&nbsp; Quantity: <b><button class="edit-button mx-3 rounded-3" onclick='subtractProduct(${i})'> - </button>${listOfProducts[i].quantity}</b><button class="edit-button mx-3 rounded-3" onclick='addProduct(${i})' >+ </button> <button class="edit-button mx-3 red rounded-3" onclick='deleteProduct(${i})' >X </button></div>
        <hr />`;
      //}
    }
    text += `<div class="card-text"><button class="clear-button" onclick=" clearCart(); location.reload();">Clear cart</button></div>`;

    document.getElementById("totalCost").innerHTML = `${totalCost.toFixed(2)}`;
  }
  document.getElementById("cart1").innerHTML = text;
  if (localStorage.length == 0) {
    document.getElementById("placeOrder").disabled = true;
    document.getElementById("discountBtn").disabled = true;
    document.getElementById("totalCost").innerHTML = `0.00`;
  } else {
    document.getElementById("placeOrder").disabled = false;
    document.getElementById("discountBtn").disabled = false;
  }
}
function clearCart() {
  localStorage.removeItem("listOfProducts");
}
function resetDiscount() {
  document.getElementById("discount").value = "";
  document.getElementById("newPrice").innerHTML = "";
  document.getElementById("acceptDiscount").innerHTML = "";
  discountUsed = false;
}

function deleteProduct(i) {
  resetDiscount();
  var listOfProducts = JSON.parse(localStorage.getItem("listOfProducts"));
  listOfProducts.splice(i, 1);
  localStorage.setItem("listOfProducts", JSON.stringify(listOfProducts));
  if (listOfProducts.length == 0) {
    localStorage.removeItem("listOfProducts");
  }
  showCart();
}

function addProduct(i) {
  resetDiscount();
  var listOfProducts = JSON.parse(localStorage.getItem("listOfProducts"));
  var ilosc = parseInt(listOfProducts[i].quantity);
  ilosc++;

  listOfProducts[i].quantity = ilosc;
  localStorage.setItem("listOfProducts", JSON.stringify(listOfProducts));

  showCart();
}
function subtractProduct(i) {
  resetDiscount();
  var listOfProducts = JSON.parse(localStorage.getItem("listOfProducts"));
  var ilosc = parseInt(listOfProducts[i].quantity);
  ilosc--;

  listOfProducts[i].quantity = ilosc;
  if (listOfProducts[i].quantity == 0) {
    deleteProduct(i);
    if (listOfProducts.length == 1) {
      localStorage.removeItem("listOfProducts");
    }
  } else localStorage.setItem("listOfProducts", JSON.stringify(listOfProducts));
  showCart();
}
var discountUsed = false;
document.getElementById("discountBtn").addEventListener("click", function () {
  var code = document.getElementById("discount").value;
  var cost = parseFloat(document.getElementById("totalCost").innerHTML);
  var newPrice = cost;
  if (code == "10%OFF" && !discountUsed) {
    discountUsed = true;
    newPrice -= cost / 10.0;
    document.getElementById(
      "totalCost"
    ).innerHTML = `<s style="color:red;">${cost.toFixed(2)}</s>`;
    document.getElementById(
      "newPrice"
    ).innerHTML = `<br/><b></B>Updated cost: <u>${newPrice.toFixed(
      2
    )}$</b></u>`;
    document.getElementById("acceptDiscount").innerHTML = `✔`;
  } else document.getElementById("acceptDiscount").innerHTML = `❌`;
});
function changeTitle() {
  var listOfProducts = JSON.parse(localStorage.getItem("listOfProducts"));
  var choice = true;
  var change = setInterval(function () {
    if (choice) document.title = "Come back!";
    else {
      if (listOfProducts === null)
        document.title = `Take a look at our products!`;
      else document.title = `You have ${listOfProducts.length} items in cart`;
    }
    choice = !choice;
    if (document.visibilityState == "visible") {
      clearInterval(change);
      document.title = "Cart";
    }
  }, 1400);
}
document.addEventListener("visibilitychange", (event) => {
  if (document.visibilityState == "visible") {
  } else {
    changeTitle();
  }
});
