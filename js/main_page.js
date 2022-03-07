var numberOfItems = 0;
var sizes = document.getElementsByName("radioSize");
var text = "Added to cart";
const button = document.querySelector("button");
function numberOfProducts() {
  var listOfProducts = JSON.parse(localStorage.getItem("listOfProducts"));
  if (listOfProducts == null) {
  } else {
    if (listOfProducts.length >= 10)
      document.getElementById(
        "cart"
      ).innerHTML = `Cart 🛒<span style="color:red"</span>(9+)`;
    if (listOfProducts != null)
      document.getElementById(
        "cart"
      ).innerHTML = ` Cart 🛒(${listOfProducts.length})`;
  }
}

function addedToCart(nazwa) {
  var isAgain = false;
  var tshirtC;
  var tshirtS;
  var product = {
    color: "empty",
    size: "empty",
    quantity: 1,
  };
  if (!document.getElementsByClassName("btn").disabled) {
    for (var i = 0; i < sizes.length; i++) {
      if (sizes[i].checked) {
        tshirtS = sizes[i].id[sizes[i].id.length - 1];
        tshirtC = sizes[i].id;
        tshirtC = tshirtC.substring(0, tshirtC.length - 1);
        tshirtC.color = tshirtC;
        product.color = tshirtC;
        product.size = tshirtS;
        var listOfProducts = JSON.parse(localStorage.getItem("listOfProducts"));
        if (listOfProducts === null) listOfProducts = [];
        for (var j = 0; j < listOfProducts.length; j++) {
          if (
            listOfProducts[j].color == tshirtC &&
            listOfProducts[j].size == tshirtS
          ) {
            product.quantity = listOfProducts[j].quantity + 1;
            console.log(product.quantity);
            listOfProducts.splice(j, 1);

            listOfProducts.push(product);
            localStorage.setItem(
              "listOfProducts",
              JSON.stringify(listOfProducts)
            );
            isAgain = true;
            break;
          }
        }
        if (!isAgain) {
          listOfProducts.push(product);
          localStorage.setItem(
            "listOfProducts",
            JSON.stringify(listOfProducts)
          );
        }
        isAgain = false;
        break;
      }
    }

    old_name = document.getElementById(nazwa).textContent;
    document.getElementById(
      nazwa
    ).innerHTML = `<div style="background-color: #C7FF8B;border-radius:3%"</div>${text}`;

    fadeOutEffect(nazwa, old_name);
  }
  document.getElementsByClassName("btn").disabled = true;
  numberOfProducts();
}

function fadeOutEffect(target, old_name) {
  var fadeTarget = document.getElementById(target);
  var fadeEffect = setInterval(function () {
    if (!fadeTarget.style.opacity) {
      fadeTarget.style.opacity = 1;
    }
    if (fadeTarget.style.opacity > 0) {
      fadeTarget.style.opacity -= 0.1;
    } else {
      clearInterval(fadeEffect);
      fadeTarget.style.opacity = 1;
      document.getElementById(
        target
      ).innerHTML = `<div style="background-color: white" </div>${old_name}`;
      document.getElementsByClassName("btn").disabled = false;
    }
  }, 80);
}
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
      document.title = "T-shirt store";
    }
  }, 1700);
}
document.addEventListener("visibilitychange", (event) => {
  if (document.visibilityState == "visible") {
  } else {
    changeTitle();
  }
});
